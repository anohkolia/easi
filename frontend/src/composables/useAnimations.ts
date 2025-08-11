import { ref, computed, onMounted, onUnmounted, type Ref } from 'vue';

interface AnimationConfig {
  duration?: number;
  delay?: number;
  easing?: string;
}

interface ScrollRevealOptions extends AnimationConfig {
  threshold?: number;
  rootMargin?: string;
}

interface CountUpOptions {
  start?: number;
  end: number;
  duration?: number;
  separator?: string;
  decimals?: number;
}

type AnimationState = 'idle' | 'playing' | 'paused' | 'completed';

export function useScrollReveal(options?: ScrollRevealOptions) {
  const element: Ref<HTMLElement | null> = ref(null);
  const isVisible = ref(false);
  const state: Ref<AnimationState> = ref('idle');

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          isVisible.value = true;
          state.value = 'playing';
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: options?.threshold || 0.1,
      rootMargin: options?.rootMargin || '0px'
    }
  );

  onMounted(() => {
    if (element.value) {
      observer.observe(element.value);
    }
  });

  onUnmounted(() => {
    if (element.value) {
      observer.unobserve(element.value);
    }
  });

  return {
    element,
    isVisible,
    state
  };
}

export function useCountUp(target: number, options?: CountUpOptions) {
  const count = ref(options?.start || 0);
  const isCounting = ref(false);
  const state: Ref<AnimationState> = ref('idle');

  const formattedCount = computed(() => {
    const value = count.value;
    if (options?.separator) {
      return value.toLocaleString('fr-FR');
    }
    return value.toString();
  });

  const start = () => {
    if (isCounting.value) return;

    isCounting.value = true;
    state.value = 'playing';
    const startValue = options?.start || 0;
    const duration = options?.duration || 2000;
    const startTime = performance.now();

    const animate = (currentTime: number) => {
      const elapsedTime = currentTime - startTime;
      const progress = Math.min(elapsedTime / duration, 1);

      count.value = Math.floor(progress * (target - startValue) + startValue);

      if (progress < 1) {
        requestAnimationFrame(animate);
      } else {
        isCounting.value = false;
        state.value = 'completed';
      }
    };

    requestAnimationFrame(animate);
  };

  return {
    count,
    formattedCount,
    isCounting,
    state,
    start
  };
}

export function useTypewriter(text: string, speed = 50) {
  const typedText = ref('');
  const isTyping = ref(false);
  const state: Ref<AnimationState> = ref('idle');
  let timeoutId: number | null = null;

  const type = () => {
    if (isTyping.value) return;

    isTyping.value = true;
    state.value = 'playing';
    typedText.value = '';
    let i = 0;

    const typeNextCharacter = () => {
      if (i < text.length) {
        typedText.value += text.charAt(i);
        i++;
        timeoutId = window.setTimeout(typeNextCharacter, speed);
      } else {
        isTyping.value = false;
        state.value = 'completed';
      }
    };

    typeNextCharacter();
  };

  const reset = () => {
    if (timeoutId) {
      clearTimeout(timeoutId);
      timeoutId = null;
    }
    typedText.value = '';
    isTyping.value = false;
    state.value = 'idle';
  };

  onUnmounted(() => {
    if (timeoutId) {
      clearTimeout(timeoutId);
    }
  });

  return {
    typedText,
    isTyping,
    state,
    type,
    reset
  };
}

export function useParallax(speed = 0.1) {
  const element: Ref<HTMLElement | null> = ref(null);
  const position = ref(0);
  const state: Ref<AnimationState> = ref('idle');
  let animationFrameId: number | null = null;

  const handleScroll = () => {
    if (!element.value) return;

    const rect = element.value.getBoundingClientRect();
    const viewportHeight = window.innerHeight;
    const elementCenter = rect.top + rect.height / 2;
    const distanceFromCenter = viewportHeight / 2 - elementCenter;

    position.value = distanceFromCenter * speed;
    state.value = 'playing';

    if (element.value) {
      element.value.style.transform = `translateY(${position.value}px)`;
    }
  };

  const start = () => {
    if (animationFrameId) return;
    state.value = 'playing';

    const animate = () => {
      handleScroll();
      animationFrameId = window.requestAnimationFrame(animate);
    };

    animate();
  };

  const stop = () => {
    if (animationFrameId) {
      window.cancelAnimationFrame(animationFrameId);
      animationFrameId = null;
    }
    state.value = 'paused';
  };

  const reset = () => {
    stop();
    position.value = 0;
    if (element.value) {
      element.value.style.transform = '';
    }
    state.value = 'idle';
  };

  onMounted(() => {
    if (typeof window !== 'undefined' && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      return;
    }
    start();
  });

  onUnmounted(() => {
    stop();
  });

  return {
    element,
    position,
    state,
    start,
    stop,
    reset
  };
}

export function useFadeIn(delay = 0) {
  const element: Ref<HTMLElement | null> = ref(null);
  const isVisible = ref(false);
  const state: Ref<AnimationState> = ref('idle');

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            isVisible.value = true;
            state.value = 'playing';
          }, delay);
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.1
    }
  );

  onMounted(() => {
    if (element.value) {
      observer.observe(element.value);
    }
  });

  onUnmounted(() => {
    if (element.value) {
      observer.unobserve(element.value);
    }
  });

  return {
    element,
    isVisible,
    state
  };
}

// Fonction utilitaire pour vérifier les préférences de réduction de mouvement
export function useReducedMotion() {
  const prefersReducedMotion = ref(false);

  onMounted(() => {
    if (typeof window !== 'undefined') {
      const mediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
      prefersReducedMotion.value = mediaQuery.matches;

      const handler = (event: MediaQueryListEvent) => {
        prefersReducedMotion.value = event.matches;
      };

      mediaQuery.addEventListener('change', handler);

      onUnmounted(() => {
        mediaQuery.removeEventListener('change', handler);
      });
    }
  });

  return {
    prefersReducedMotion
  };
}

// Fonction pour animer des éléments en séquence
export function useStaggeredAnimation(
  elements: Ref<HTMLElement[]>,
  options: {
    delayBetween?: number;
    animationFn: (el: HTMLElement) => void;
  }
) {
  const state: Ref<AnimationState> = ref('idle');
  const { prefersReducedMotion } = useReducedMotion();

  const start = () => {
    if (prefersReducedMotion.value) {
      elements.value.forEach(options.animationFn);
      state.value = 'completed';
      return;
    }

    state.value = 'playing';
    elements.value.forEach((el, index) => {
      setTimeout(() => {
        options.animationFn(el);
        if (index === elements.value.length - 1) {
          state.value = 'completed';
        }
      }, index * (options.delayBetween || 100));
    });
  };

  return {
    state,
    start
  };
}