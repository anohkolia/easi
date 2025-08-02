<script setup lang="ts"></script>

<template>
  <section class="bg-gray-200">
    <footer class="section-p1 py-10 px-10 md:px-10">
      <div class="flex flex-col md:flex-row md:justify-between gap-8 px-1">
        <!-- Colonne 1 -->
        <div class="col flex-1">
          <img class="logo w-20 mb-4" src="@/assets/images/logo-easi.png" alt="logo" />
          <h4 class="text-lg font-semibold text-[#088178] mb-2">Contacts</h4>
          <p class="text-[#088178] mb-1">
            <strong>Adresse: </strong>Carrefour Bonoua 1, voie non bitumée
          </p>
          <p class="text-[#088178] mb-1"><strong>Téléphone: </strong>(+225) 0707277998</p>
          <p class="text-[#088178] mb-4">
            <strong>Services: </strong>08:00 - 17:00, Lundi - Vendredi
          </p>
          <div class="follow">
            <h4 class="text-lg font-semibold text-[#088178] mb-2">Suivez-nous</h4>
            <div class="icon flex gap-4 text-2xl">
              <a href="#" class="hover:text-[#0717de] cursor-pointer">
                <i class="fa-brands fa-facebook"></i>
              </a>
              <a href="#" class="hover:text-[#1fc08f] cursor-pointer">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Colonne 2 -->
        <div class="col flex-1">
          <h4 class="text-lg font-semibold text-[#088178] mb-2">à Propos</h4>
          <a href="#" class="block text-[#088178] hover:text-[#EF7900] mb-1">à propos de nous</a>
          <a href="#" class="block text-[#088178] hover:text-[#EF7900] mb-1"
            >Politique de confidentialité</a
          >
          <a href="#" class="block text-[#088178] hover:text-[#EF7900] mb-1">Termes & Conditions</a>
          <a href="#" class="block text-[#088178] hover:text-[#EF7900]">Contactez-nous</a>
        </div>
      </div>
    </footer>
  </section>
</template>

<style scoped></style>
