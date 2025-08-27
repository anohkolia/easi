import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '@/views/HomePage.vue'
import EartisanPage from '@/views/EartisanPage.vue'
import ServiceFormView from '@/components/eartisan/ServiceFormView.vue'
import NotFound from '@/components/eartisan/NotFound.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomePage,
    },
    {
      path: '/eartisan',
      name: 'eartisan',
      component: EartisanPage,
    },
    {
      path: '/service/:serviceSlug',
      name: 'ServiceForm',
      component: ServiceFormView,
      props: (route) => ({
    serviceSlug: route.params.serviceSlug,
    serviceName: route.query.serviceName
    })
    },
    {
  path: '/:pathMatch(.*)*',
  name: 'NotFound',
  component: NotFound,
}
  ],
})

export default router
