<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import api from '@/api/http.js'
import HomePage from '@/views/HomePage.vue'

const message = ref('Chargement...')

onMounted(async () => {
  const res = await api.get<{ message: string }>('/ping')
  message.value = res.data.message
})

const currentYear = computed(() => new Date().getFullYear())

const legalLinks = [
  { name: 'CGU', href: '/cgu' },
  { name: 'Confidentialité', href: '/confidentialite' },
  { name: 'Cookies', href: '/cookies'},
  { name: 'Mentions légales', href: '/mentions-legales' },
]

</script>

<template>
  <main class="relative font-poppins">
    <RouterView />
    <!-- Élément vide pour compenser la hauteur de la navbar en position fixe -->
    <div class="h-[72px] hidden" id="navbar-spacer"></div>

    <section class="bg-gray-900 text-white">
      <div class="container mx-auto px-4">
      <!-- Section légale -->
      <div class="py-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
          <!-- Copyright -->
          <div class="text-sm text-gray-400">
            © {{ currentYear }} EASI. Tous droits réservés.
          </div>

          <!-- Liens légaux -->
          <div class="flex flex-wrap gap-6 text-sm">
            <a
              v-for="link in legalLinks"
              :key="link.name"
              :href="link.href"
              class="text-gray-400 hover:text-[#088178] transition-colors duration-200"
            >
              {{ link.name }}
            </a>
          </div>
        </div>
      </div>
      </div>
    </section>
  </main>
</template>

<style scoped>
/* Si la classe font-poppins n'existe pas dans Tailwind, ajoutez ceci : */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

.font-poppins {
  font-family: 'Poppins', sans-serif;
}
</style>
