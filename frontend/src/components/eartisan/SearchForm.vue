<script setup lang="ts">
import { ref, computed, watch } from 'vue'

// Types
interface LocationSuggestion {
  id: string
  name: string
  region: string
  coordinates?: { lat: number; lng: number }
}

interface SearchData {
  location: string
  category: string
  priceRange: string
  distance: string
}

interface SearchErrors {
  location?: string
  category?: string
}

// Props
interface Props {
  size?: 'compact' | 'large'
  showFilters?: boolean
  placeholder?: string
}

const props = withDefaults(defineProps<Props>(), {
  size: 'large',
  showFilters: true,
  placeholder: 'Ville, code postal...',
})

// Emits
const emit = defineEmits<{
  search: [data: SearchData]
  locationDetected: [location: { lat: number; lng: number; name: string }]
  categorySelected: [category: string]
}>()

// État réactif
const searchData = ref<SearchData>({
  location: '',
  category: '',
  priceRange: '',
  distance: '',
})

const errors = ref<SearchErrors>({})
const isLoading = ref(false)
const isGettingLocation = ref(false)
const showLocationSuggestions = ref(false)
const showAdvancedFilters = ref(false)

// Suggestions de localisation (simulées)
const locationSuggestions = ref<LocationSuggestion[]>([])

// Classes computed
const formClasses = computed(() => {
  return {
    'bg-white p-4 rounded-lg shadow-lg': props.size === 'large',
    'bg-transparent': props.size === 'compact',
  }
})

// Validation
const validateForm = (): boolean => {
  errors.value = {}

  if (!searchData.value.location.trim()) {
    errors.value.location = 'Veuillez saisir une localisation'
  }

  if (props.size === 'large' && props.showFilters && !searchData.value.category) {
    errors.value.category = 'Veuillez sélectionner un métier'
  }

  return Object.keys(errors.value).length === 0
}

// Gestion de la saisie de localisation avec debounce
let locationTimeout: NodeJS.Timeout

const handleLocationInput = () => {
  clearTimeout(locationTimeout)
  locationTimeout = setTimeout(() => {
    if (searchData.value.location.length >= 3) {
      fetchLocationSuggestions(searchData.value.location)
    } else {
      locationSuggestions.value = []
    }
  }, 300)
}

// Simulation de récupération de suggestions
const fetchLocationSuggestions = async (query: string) => {
  // Simulation d'appel API
  const mockSuggestions: LocationSuggestion[] = [
    { id: '1', name: 'Paris', region: 'Île-de-France (75)' },
    { id: '2', name: 'Lyon', region: 'Auvergne-Rhône-Alpes (69)' },
    { id: '3', name: 'Marseille', region: "Provence-Alpes-Côte d'Azur (13)" },
    { id: '4', name: 'Toulouse', region: 'Occitanie (31)' },
    { id: '5', name: 'Nice', region: "Provence-Alpes-Côte d'Azur (06)" },
  ]

  locationSuggestions.value = mockSuggestions.filter(
    (suggestion) =>
      suggestion.name.toLowerCase().includes(query.toLowerCase()) ||
      suggestion.region.toLowerCase().includes(query.toLowerCase()),
  )
}

// Sélection de localisation
const selectLocation = (suggestion: LocationSuggestion) => {
  searchData.value.location = `${suggestion.name}, ${suggestion.region}`
  locationSuggestions.value = []
  showLocationSuggestions.value = false

  if (errors.value.location) {
    delete errors.value.location
  }
}

// Géolocalisation
const getCurrentLocation = () => {
  if (!navigator.geolocation) {
    alert("La géolocalisation n'est pas supportée par votre navigateur")
    return
  }

  isGettingLocation.value = true

  navigator.geolocation.getCurrentPosition(
    async (position) => {
      const { latitude, longitude } = position.coords

      try {
        // Simulation de géocodage inverse
        const locationName = 'Ma position actuelle'
        searchData.value.location = locationName

        emit('locationDetected', {
          lat: latitude,
          lng: longitude,
          name: locationName,
        })

        if (errors.value.location) {
          delete errors.value.location
        }
      } catch (error) {
        console.error('Erreur de géocodage:', error)
      } finally {
        isGettingLocation.value = false
      }
    },
    (error) => {
      console.error('Erreur de géolocalisation:', error)
      alert("Impossible d'obtenir votre position")
      isGettingLocation.value = false
    },
    {
      enableHighAccuracy: true,
      timeout: 5000,
      maximumAge: 300000,
    },
  )
}

// Gestion de la soumission
const handleSearch = () => {
  if (!validateForm()) {
    return
  }

  isLoading.value = true

  // Simulation d'appel API
  setTimeout(() => {
    emit('search', { ...searchData.value })
    isLoading.value = false
  }, 1000)
}

// Fermer les suggestions quand on clique ailleurs
const closeLocationSuggestions = () => {
  showLocationSuggestions.value = false
}

// Watch pour émettre les changements de catégorie
watch(
  () => searchData.value.category,
  (newCategory) => {
    if (newCategory) {
      emit('categorySelected', newCategory)
    }
  },
)

// Fermer suggestions au click outside
document.addEventListener('click', (event) => {
  const target = event.target as HTMLElement
  if (!target.closest('.relative')) {
    closeLocationSuggestions()
  }
})
</script>

<template>
  <section class="">
    <div class="flex items-center justify-between">
      <form @submit.prevent="handleSearch" class="w-full" :class="formClasses">
        <div class="flex flex-col md:flex-row gap-4">
          <!-- Champ Localisation -->
          <div class="flex-1 relative">
            <div class="relative">
              <input
                v-model="searchData.location"
                type="text"
                :placeholder="placeholder"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#088178] focus:border-transparent outline-none transition-all duration-300"
                :class="{ 'border-red-500': errors.location }"
                @input="handleLocationInput"
                @focus="showLocationSuggestions = true"
              />

              <!-- Bouton Géolocalisation -->
              <button
                type="button"
                @click="getCurrentLocation"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-[#088178] transition-colors duration-300"
                :disabled="isGettingLocation"
                title="Utiliser ma position"
              >
                <svg
                  v-if="!isGettingLocation"
                  class="w-5 h-5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                  />
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                  />
                </svg>
                <svg
                  v-else
                  class="w-5 h-5 animate-spin"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                  />
                </svg>
              </button>
            </div>

            <!-- Suggestions de localisation -->
            <Transition
              enter-active-class="transition-opacity duration-300"
              leave-active-class="transition-opacity duration-300"
              enter-from-class="opacity-0"
              leave-to-class="opacity-0"
            >
              <div
                v-if="showLocationSuggestions && locationSuggestions.length > 0"
                class="absolute top-full left-0 right-0 bg-white border border-gray-300 rounded-lg shadow-lg mt-1 z-10 max-h-48 overflow-y-auto"
              >
                <button
                  v-for="suggestion in locationSuggestions"
                  :key="suggestion.id"
                  type="button"
                  @click="selectLocation(suggestion)"
                  class="w-full text-left px-4 py-2 hover:bg-gray-50 transition-colors duration-200 border-b border-gray-100 last:border-b-0"
                >
                  <div class="font-medium text-gray-900">{{ suggestion.name }}</div>
                  <div class="text-sm text-gray-500">{{ suggestion.region }}</div>
                </button>
              </div>
            </Transition>

            <p v-if="errors.location" class="text-red-500 text-sm mt-1">{{ errors.location }}</p>
          </div>

          <!-- Dropdown Métiers -->
          <div class="flex-1 relative" v-if="size === 'large' || showFilters">
            <select
              v-model="searchData.category"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#088178] focus:border-transparent outline-none transition-all duration-300 bg-white appearance-none cursor-pointer"
              :class="{ 'border-red-500': errors.category }"
            >
              <option value="">Sélectionner un métier</option>
              <optgroup label="Bâtiment">
                <option value="maconnerie">Maçonnerie</option>
                <option value="charpenterie">Charpenterie</option>
                <option value="couverture">Couverture</option>
                <option value="isolation">Isolation</option>
              </optgroup>
              <optgroup label="Finition">
                <option value="peinture">Peinture</option>
                <option value="carrelage">Carrelage</option>
                <option value="parquet">Parquet</option>
                <option value="decoration">Décoration</option>
              </optgroup>
              <optgroup label="Équipements">
                <option value="plomberie">Plomberie</option>
                <option value="electricite">Électricité</option>
                <option value="chauffage">Chauffage</option>
                <option value="climatisation">Climatisation</option>
              </optgroup>
              <optgroup label="Extérieur">
                <option value="jardinage">Jardinage</option>
                <option value="terrassement">Terrassement</option>
                <option value="cloture">Clôture</option>
              </optgroup>
            </select>

            <!-- Icône dropdown -->
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
              <svg
                class="w-5 h-5 text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </div>

            <p v-if="errors.category" class="text-red-500 text-sm mt-1">{{ errors.category }}</p>
          </div>

          <!-- Filtres avancés (mode large uniquement) -->
          <div v-if="size === 'large' && showAdvancedFilters" class="flex gap-4">
            <!-- Filtre Prix -->
            <select
              v-model="searchData.priceRange"
              class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#088178] focus:border-transparent outline-none transition-all duration-300 bg-white"
            >
              <option value="">Tous les prix</option>
              <option value="0-500">0 - 500€</option>
              <option value="500-1000">500 - 1000€</option>
              <option value="1000-2000">1000 - 2000€</option>
              <option value="2000+">2000€ et plus</option>
            </select>

            <!-- Filtre Distance -->
            <select
              v-model="searchData.distance"
              class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#088178] focus:border-transparent outline-none transition-all duration-300 bg-white"
            >
              <option value="">Toutes distances</option>
              <option value="5">5 km</option>
              <option value="10">10 km</option>
              <option value="20">20 km</option>
              <option value="50">50 km</option>
            </select>
          </div>

          <!-- Bouton Rechercher -->
          <button
            type="submit"
            :disabled="isLoading"
            class="px-8 py-3 bg-[#EF7900] text-white rounded-lg font-medium hover:bg-[#d6690a] transition-all duration-300 shadow-sm hover:shadow-md disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center min-w-[120px]"
            :class="size === 'compact' ? 'w-full md:w-auto' : ''"
          >
            <span v-if="!isLoading">Rechercher</span>
            <div v-else class="flex items-center space-x-2">
              <svg
                class="animate-spin w-4 h-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                />
              </svg>
              <span>Recherche...</span>
            </div>
          </button>
        </div>

        <!-- Toggle Filtres avancés -->
        <div v-if="size === 'large'" class="mt-4">
          <button
            type="button"
            @click="showAdvancedFilters = !showAdvancedFilters"
            class="text-[#088178] hover:text-[#066b5f] transition-colors duration-300 text-sm font-medium flex items-center space-x-1"
          >
            <span>{{ showAdvancedFilters ? 'Masquer' : 'Afficher' }} les filtres avancés</span>
            <svg
              class="w-4 h-4 transition-transform duration-300"
              :class="{ 'rotate-180': showAdvancedFilters }"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>
        </div>
      </form>
    </div>
  </section>
</template>

<style scoped></style>
