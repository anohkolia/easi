import { ref } from 'vue'

interface CountUpOptions {
  duration?: number
  separator?: string
  easing?: (t: number) => number
}

// Fonction d'interpolation par défaut (easeOutExpo)
const defaultEasing = (t: number): number => {
  return t === 1 ? 1 : 1 - Math.pow(2, -10 * t)
}

export function useCountUp(endValue: number, options: CountUpOptions = {}) {
  const { duration = 2000, separator = '', easing = defaultEasing } = options

  const count = ref<string>('0')
  let animationFrame: number
  let startTime: number
  let startValue = 0

  const formatNumber = (num: number): string => {
    return separator
      ? Math.round(num)
          .toString()
          .replace(/\B(?=(\d{3})+(?!\d))/g, separator)
      : Math.round(num).toString()
  }

  const animate = (currentTime: number) => {
    if (!startTime) startTime = currentTime
    const progress = Math.min((currentTime - startTime) / duration, 1)
    const easedProgress = easing(progress)
    const currentValue = startValue + (endValue - startValue) * easedProgress

    count.value = formatNumber(currentValue)

    if (progress < 1) {
      animationFrame = requestAnimationFrame(animate)
    }
  }

  const start = () => {
    cancelAnimationFrame(animationFrame)
    startTime = 0
    animationFrame = requestAnimationFrame(animate)
  }

  return {
    count,
    start,
  }
}
