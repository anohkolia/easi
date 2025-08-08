<script setup lang="ts">
import HeaderView from '@/components/eartisan/HeaderView.vue'
import FooterView from '@/components/eartisan/FooterView.vue'
import HeroView from '@/components/eartisan/HeroView.vue'
import AboutUsView from '@/components/eartisan/AboutUsView.vue'
import ConfianceView from '@/components/eartisan/ConfianceView.vue'
import ArticleView from '@/components/eartisan/ArticleView.vue'
import SearchForm from '@/components/eartisan/SearchForm.vue'
</script>

<template>
  <main class="bg-gray-50">
    <HeaderView />

    <HeroView />

    <SearchForm />

    <ConfianceView />

    <ArticleView />

    <AboutUsView />

    <FooterView />
  </main>
</template>

<style scoped></style>
