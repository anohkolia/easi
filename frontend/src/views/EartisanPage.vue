<script setup lang="ts">
import HeaderView from '@/components/eartisan/HeaderView.vue'
import FooterView from '@/components/eartisan/FooterView.vue'
import HeroView from '@/components/eartisan/HeroView.vue'
import AboutUsView from '@/components/eartisan/AboutUsView.vue'
import ConfianceView from '@/components/eartisan/ConfianceView.vue'
import ArticleView from '@/components/eartisan/ArticleView.vue'
import SearchForm from '@/components/eartisan/SearchForm.vue'
import ServicesView from '@/components/eartisan/ServicesView.vue'

import { useHead } from '@vueuse/head'

// Configuration SEO
useHead({
  title: 'Trouver un artisan compétent pour vos travaux - eartisan',
  meta: [
    {
      name: 'description',
      content:
        "eartisan vous connecte avec les meilleurs artisans pour tous vos projets. Trouvez des professionnels qualifiés près de chez vous et bénéficiez de notre garantie Sécuri'Travaux.",
    },
    { property: 'og:title', content: 'Trouver un artisan compétent pour vos travaux - eartisan' },
    { property: 'og:description', content: 'Des professionnels en un clic pour tous vos travaux' },
    { property: 'og:type', content: 'website' },
    { property: 'og:url', content: 'https://www.eartisan.com' },
    { property: 'og:image', content: '/images/og-image.jpg' },
  ],
  link: [{ rel: 'canonical', href: 'https://www.eartisan.com' }],
  script: [
    {
      type: 'application/ld+json',
      innerHTML: JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'Organization',
        name: 'eartisan',
        url: 'https://www.eartisan.com',
        logo: 'https://www.eartisan.com/logo.png',
        description: 'Plateforme de mise en relation avec des artisans qualifiés',
        sameAs: ['https://www.facebook.com/eartisan', 'https://www.instagram.com/eartisan'],
      }),
    },
  ],
})
</script>

<template>
  <main class="bg-gray-50">
    <HeaderView />

    <HeroView />

    <SearchForm />

    <ServicesView />

    <ConfianceView />

    <ArticleView />

    <AboutUsView />

    <FooterView />
  </main>
</template>

<style scoped></style>
