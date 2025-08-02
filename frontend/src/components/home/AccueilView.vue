<script setup lang="ts">
import { ref } from 'vue'
// Importing images for banners
import imgArtisan from '@/assets/images/home/ha.jpg'
import imgCommerce from '@/assets/images/home/hc.jpg'
import imgLibrairie from '@/assets/images/home/hb.jpg'

// Importing images for partners
import logoPoste from '@/assets/images/home/logo-poste.png'
import logoEasi from '@/assets/images/logo-easi.png'
import logoOrange from '@/assets/images/home/logo-orange.png'
import logoSodeci from '@/assets/images/home/sodeci.png'
import logoCnps from '@/assets/images/home/cnps.png'
import logoCie from '@/assets/images/home/logo-cie.png'

const banners = ref([
  {
    id: 1,
    title: 'E-ARTISAN',
    subtitle: 'Découvrez nos artisans locaux',
    image: imgArtisan,
  },
  {
    id: 2,
    title: 'E-COMMERCE',
    subtitle: 'Achetez en ligne facilement',
    image: imgCommerce,
  },
  {
    id: 3,
    title: 'E-LIBRAIRIE',
    subtitle: 'Explorez notre bibliothèque',
    image: imgLibrairie,
  },
])

const partenaires = ref([
  {
    id: 1,
    name: 'La Poste',
    url: 'https://laposte.ci',
    logo: logoPoste,
  },
  {
    id: 2,
    name: 'EASI',
    url: 'https://www.easi.ci',
    logo: logoEasi,
  },
  {
    id: 3,
    name: 'Orange',
    url: 'https://www.orange.ci',
    logo: logoOrange,
  },
  {
    id: 4,
    name: 'SODECI',
    url: 'https://www.sodeci.ci',
    logo: logoSodeci,
  },
  {
    id: 5,
    name: 'CNPS',
    url: 'https://www.cnps.ci',
    logo: logoCnps,
  },
  {
    id: 6,
    name: 'CIE',
    url: 'https://www.cie.ci',
    logo: logoCie,
  },
])
</script>

<template>
  <!-- SECTION HERO -->
  <section>
    <!-- Hero Header -->
    <header
      class="flex flex-col md:flex-row justify-between items-center px-6 md:px-10 pt-10 gap-8"
    >
      <div class="w-full md:w-2/3 px-1">
        <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6 text-gray-900">
          Une solution numérique et digitale pensée pour tout vos besoins...
        </h1>

        <div class="text-xl text-gray-600 mb-8 md:mb-12">
          EASI (Entreprise Africaine de Solution Innovante) est un cabinet chargé de mettre à votre
          disposition différents prestataires de services de différents domaines en seulement
          quelques temps. Des prestataires professionnels, fiables pour vos besoins.
        </div>
      </div>

      <div class="w-full md:w-1/3 flex justify-center md:justify-end">
        <img src="@/assets/images/easi-embleme-0.png" alt="Hero Image" class="object-cover" />
      </div>
    </header>
  </section>

  <!-- SECTION BANNER -->
  <section>
    <div class="py-10 px-10">
      <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Nos Services</h2>
      <p class="text-center text-gray-600 mb-8 pb-5">Découvrez nos différentes offres</p>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-1">
        <div
          v-for="banner in banners"
          :key="banner.id"
          class="transform hover:scale-[1.02] bg-cover bg-center rounded-lg overflow-hidden relative h-32 group transition-all duration-500 hover:shadow-xl"
          :style="{ backgroundImage: `url(${banner.image})` }"
        >
          <div
            class="absolute bottom-6 left-6 text-white group-hover:translate-x-1 transition-transform duration-300"
          >
            <h2 class="text-2xl font-bold mb-1 drop-shadow-md cursor-pointer hover:underline">
              <router-link to="#">{{ banner.title }}</router-link>
            </h2>
            <h3 class="text-lg font-medium drop-shadow-sm">{{ banner.subtitle }}</h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION NEWSLETTER -->
  <section>
    <div
      id="newsletter"
      class="bg-[#088178] text-white py-10 px-10 flex flex-col md:flex-row justify-between items-center gap-6 my-12"
    >
      <div class="newstext max-w-xl pl-1">
        <h4 class="text-2xl font-bold mb-2">Abonnez-vous à notre Newsletter</h4>
        <p class="text-gray-300">
          Restez informé des dernières nouvelles et offres exclusives ou contactez-nous
          <a href="#" class="inline-block">
            <span class="text-[#EF7900] transition-colors font-bold">ici</span>
          </a>
        </p>
      </div>

      <div class="form flex w-full md:w-auto mt-4 md:mt-0 pr-1">
        <input
          type="email"
          placeholder="Entrez votre email"
          class="py-3 px-4 w-full md:w-64 text-black rounded-l-md outline-none border-r-0 bg-white"
        />
        <button
          class="bg-[#EF7900] hover:bg-[#0a9a90] text-black font-bold py-3 px-6 rounded-r-md transition-colors cursor-pointer"
        >
          Sign Up
        </button>
      </div>
    </div>
  </section>

  <!-- SECTION NOS PARTENAIRES -->
  <section>
    <div id="feature" class="py-10 px-10">
      <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Nos Partenaires</h2>
      <p class="text-center text-gray-600 mb-8">Ils nous font confiance</p>
      <div class="flex flex-wrap justify-center">
        <div
          v-for="partenaire in partenaires"
          :key="partenaire.id"
          class="bg-white rounded-lg p-6 hover:shadow-lg transition-shadow duration-300"
        >
          <a :href="partenaire.url" class="block grayscale hover:grayscale-0">
            <img
              :src="partenaire.logo"
              :alt="`Logo ${partenaire.name}`"
              class="w-20 h-15 mx-auto"
            />
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped></style>
