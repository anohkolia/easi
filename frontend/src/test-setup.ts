import { expect } from 'vitest'
import { config } from '@vue/test-utils'
import { createRouter, createWebHistory } from 'vue-router'

// Mock du router Vue
const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: { template: '<div>Home</div>' } },
    { path: '/securitravaux', component: { template: '<div>Securitravaux</div>' } },
  ],
})

// Configuration globale pour Vue Test Utils
config.global.plugins = [router]

// Extensions personnalisées pour les assertions
expect.extend({
  toBeWithinRange(received: number, floor: number, ceiling: number) {
    const pass = received >= floor && received <= ceiling
    if (pass) {
      return {
        message: () => `expected ${received} not to be within range ${floor} - ${ceiling}`,
        pass: true,
      }
    } else {
      return {
        message: () => `expected ${received} to be within range ${floor} - ${ceiling}`,
        pass: false,
      }
    }
  },
})
