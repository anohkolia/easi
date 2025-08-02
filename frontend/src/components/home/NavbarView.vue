<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from 'vue'

const isMenuOpen = ref(false)
const isScrolled = ref(false)

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}

const closeMenu = () => {
  isMenuOpen.value = false
}

const handleScroll = () => {
  isScrolled.value = window.scrollY > 50
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onBeforeUnmount(() => {
  window.removeEventListener('scroll', handleScroll)
})
</script>

<template>
  <section class="bg-gray-200">
    <nav
      :class="[
        'flex items-center justify-between px-10 py-4 shadow-md transition-all duration-300 w-full',
        isScrolled
          ? 'fixed top-0 left-0 right-0 z-50 bg-gray-200/95 backdrop-blur-sm py-3'
          : 'bg-gray-200',
      ]"
    >
      <a href="#" class="flex items-center">
        <img src="@/assets/images/logo-easi.png" class="logo h-12" alt="Logo EASI" />
      </a>

      <div>
        <ul
          id="navbar"
          :class="[
            'lg:flex',
            'items-center',
            'space-x-10',
            isMenuOpen
              ? 'flex flex-col fixed top-0 right-0 h-screen bg-white w-64 shadow-lg pt-20 px-4 z-50 transition-all duration-300'
              : 'hidden lg:flex',
          ]"
        >
          <li>
            <a
              class="active:bg-[#EF7900] font-bold py-2 px-3 text-[#088178] hover:text-[#EF7900] border-b-2 border-[#EF7900]"
              href="index.html"
              >Accueil</a
            >
          </li>
          <li>
            <router-link
              class="font-bold py-2 px-3 text-[#088178] hover:text-[#EF7900]"
              to="/eartisan"
              >eartisan</router-link
            >
          </li>
          <li>
            <a class="font-bold py-2 px-3 text-[#088178] hover:text-[#EF7900]" href="#"
              >ecommerce</a
            >
          </li>
          <li>
            <a class="font-bold py-2 px-3 text-[#088178] hover:text-[#EF7900]" href="#"
              >elibrairie</a
            >
          </li>
          <li>
            <a class="font-bold py-2 px-3 text-[#088178] hover:text-[#EF7900]" href="#"
              >eimmobilier</a
            >
          </li>
          <li>
            <a class="font-bold py-2 px-3 text-[#088178] hover:text-[#EF7900]" href="#"
              >eagricole</a
            >
          </li>
          <a
            href="#"
            id="close"
            class="absolute top-5 right-5 text-xl lg:hidden"
            @click.prevent="closeMenu"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </a>
        </ul>
      </div>
      <div id="mobile" class="lg:hidden">
        <button @click="toggleMenu" id="bar" class="text-gray-800 hover:text-[#088178]">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"
            />
          </svg>
        </button>
      </div>
    </nav>
  </section>
</template>

<style scoped>
.logo {
  width: 80px;
}

@media (max-width: 1024px) {
  #navbar {
    transition: all 0.3s ease;
  }

  #navbar li {
    margin-bottom: 1rem;
  }
}

#navbar .active {
  position: relative;
  color: #088178;
}

#navbar a {
  color: #088178;
}

#navbar a:hover {
  color: #ef7900;
}

section {
  transition: all 0.3s ease;
}

section.fixed {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}
</style>
