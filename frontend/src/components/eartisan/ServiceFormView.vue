<template>
  <section class="py-12 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-4xl">
      <!-- En-tête -->
      <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-[#088178] mb-2">
          {{ serviceName }}
        </h1>
        <p class="text-gray-600">Décrivez-nous votre besoin en détail</p>
      </div>

      <!-- Formulaire -->
      <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
        <!-- Type de service -->
        <div class="mb-8">
          <label class="block text-lg font-semibold text-gray-800 mb-4">
            Type de service *
          </label>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <button
              v-for="option in serviceOptions"
              :key="option.value"
              @click="selectServiceType(option.value)"
              :class="[
                'p-4 rounded-lg border-2 text-left transition-all duration-300',
                selectedServiceType === option.value
                  ? 'border-[#088178] bg-[#088178] bg-opacity-10'
                  : 'border-gray-300 hover:border-[#088178] hover:bg-gray-50'
              ]"
            >
              <div class="flex items-center">
                <div class="w-10 h-10 bg-[#088178] bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                  <i :class="option.icon" class="text-[#088178]"></i>
                </div>
                <span class="font-medium">{{ option.label }}</span>
              </div>
            </button>
          </div>
        </div>

        <!-- Options spécifiques -->
        <div v-if="selectedServiceType" class="mb-8">
          <label class="block text-lg font-semibold text-gray-800 mb-4">
            Sélectionnez votre besoin *
          </label>
          
          <!-- Options prédéfinies -->
          <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
            <button
              v-for="item in currentOptions"
              :key="item"
              @click="toggleOption(item)"
              :class="[
                'px-4 py-3 rounded-lg border text-sm font-medium transition-all duration-200',
                selectedOptions.includes(item)
                  ? 'border-[#088178] bg-[#088178] bg-opacity-10 text-[#088178]'
                  : 'border-gray-300 text-gray-700 hover:border-[#088178] hover:bg-gray-50'
              ]"
            >
              {{ item }}
            </button>
          </div>

          <!-- Autre option -->
          <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Autre besoin (précisez)
            </label>
            <input
              v-model="otherOption"
              type="text"
              placeholder="Décrivez votre besoin spécifique..."
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-[#088178] focus:ring-2 focus:ring-[#088178] focus:ring-opacity-20 transition-colors duration-300"
            />
          </div>
        </div>

        <!-- Détails supplémentaires -->
        <div class="mb-8">
          <label class="block text-lg font-semibold text-gray-800 mb-4">
            Détails supplémentaires *
          </label>
          <textarea
            v-model="details"
            rows="4"
            placeholder="Décrivez en détail votre projet, les mesures, les contraintes, etc..."
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-[#088178] focus:ring-2 focus:ring-[#088178] focus:ring-opacity-20 transition-colors duration-300 resize-none"
            required
          ></textarea>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4">
          <button
            @click="goBack"
            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-300 flex-1"
          >
            Retour
          </button>
          <button
            @click="submitForm"
            :disabled="!isFormValid"
            :class="[
              'px-6 py-3 rounded-lg font-medium transition-colors duration-300 flex-1',
              isFormValid
                ? 'bg-[#EF7900] text-white hover:bg-[#d66800]'
                : 'bg-gray-300 text-gray-500 cursor-not-allowed'
            ]"
          >
            Soumettre la demande
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const router = useRouter();

// Données du formulaire
const serviceName = ref('');
const selectedServiceType = ref('');
const selectedOptions = ref<string[]>([]);
const otherOption = ref('');
const details = ref('');

// Options de service
const serviceOptions = [
  { value: 'installation', label: 'Installation et Pose', icon: 'fas fa-tools' },
  { value: 'depannage', label: 'Dépannage et Fuite', icon: 'fas fa-wrench' }
];

// Options spécifiques par type
const specificOptions = {
  installation: [
    'Baignoire', 'Lavabo', 'Jacuzzi', 'WC', 'Robinet', 
    'Evier', 'Chauffe eau', 'Siphon', 'Douche'
  ],
  depannage: [
    'Dépannage Baignoire', 'Dépannage Lavabo', 'Dépannage Jacuzzi', 
    'Dépannage WC', 'Dépannage Robinet', 'Dépannage Fuite'
  ]
};

// Options actuelles basées sur le type sélectionné
const currentOptions = computed(() => {
  return selectedServiceType.value ? specificOptions[selectedServiceType.value as keyof typeof specificOptions] : [];
});

// Validation du formulaire
const isFormValid = computed(() => {
  return selectedServiceType.value && details.value.trim().length > 0;
});

// Initialisation
onMounted(() => {
  // Récupère le nom du service depuis les query params
  serviceName.value = route.query.serviceName as string || 'Service';
  
  // Vous pouvez aussi utiliser le serviceSlug si besoin
  const serviceSlug = route.params.serviceSlug as string;
  console.log('Service slug:', serviceSlug);
});

// Méthodes
const selectServiceType = (type: string) => {
  selectedServiceType.value = type;
  selectedOptions.value = [];
  otherOption.value = '';
};

const toggleOption = (option: string) => {
  const index = selectedOptions.value.indexOf(option);
  if (index > -1) {
    selectedOptions.value.splice(index, 1);
  } else {
    selectedOptions.value.push(option);
  }
};

const goBack = () => {
  router.back();
};

const submitForm = () => {
  if (!isFormValid.value) return;

  const formData = {
    service: serviceName.value,
    type: selectedServiceType.value,
    selectedOptions: selectedOptions.value,
    otherOption: otherOption.value,
    details: details.value,
    timestamp: new Date().toISOString()
  };

  console.log('Données du formulaire:', formData);
  
  // Ici vous pouvez envoyer les données à votre API
  // et rediriger vers une page de confirmation
  alert('Votre demande a été soumise avec succès !');
  router.push('/confirmation');
};
</script>

<style scoped>
/* Styles responsives */
@media (max-width: 640px) {
  .grid-cols-2 {
    grid-template-columns: 1fr;
  }
}
</style>