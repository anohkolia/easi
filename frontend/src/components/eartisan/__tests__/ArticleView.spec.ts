import { describe, it, expect, beforeEach, vi } from 'vitest'
import { mount } from '@vue/test-utils'
import ArticleView from '../ArticleView.vue'

describe('ArticleView', () => {
  let wrapper: any

  beforeEach(() => {
    wrapper = mount(ArticleView)
  })

  it('renders the component correctly', () => {
    expect(wrapper.exists()).toBe(true)
  })

  it('displays the correct title', () => {
    const title = wrapper.find('h2')
    expect(title.text()).toBe("Sécuri'Travaux : la garantie de travaux bien faits")
  })

  it('renders all 4 steps', () => {
    const steps = wrapper.findAll('[aria-label^="Étape"]')
    expect(steps.length).toBe(4)
  })

  it('has correct step titles', () => {
    const stepTitles = wrapper.findAll('h3')
    expect(stepTitles.length).toBe(4)
    expect(stepTitles[0].text()).toBe('Commande sécurisée')
    expect(stepTitles[1].text()).toBe('Réalisation des travaux')
    expect(stepTitles[2].text()).toBe('Validation client')
    expect(stepTitles[3].text()).toBe('Paiement débloqué')
  })

  it('has correct step descriptions', () => {
    const descriptions = wrapper.findAll('p.text-gray-600')
    expect(descriptions[0].text()).toBe('Paiement bloqué sur un compte sécurisé')
    expect(descriptions[1].text()).toBe("L'artisan intervient selon les termes convenus")
    expect(descriptions[2].text()).toBe('Vous validez la bonne exécution des travaux')
    expect(descriptions[3].text()).toBe("L'artisan est payé après votre accord")
  })

  it('has proper accessibility attributes', () => {
    const steps = wrapper.findAll('[aria-label^="Étape"]')
    steps.forEach((step: any, index: number) => {
      expect(step.attributes('aria-label')).toContain(`Étape ${index + 1}`)
    })

    const icons = wrapper.findAll('i[aria-hidden="true"]')
    expect(icons.length).toBeGreaterThan(0)
  })

  it('has responsive design classes', () => {
    const desktopTimeline = wrapper.find('.hidden.md\\:block')
    const mobileTimeline = wrapper.find('.md\\:hidden')

    expect(desktopTimeline.exists()).toBe(true)
    expect(mobileTimeline.exists()).toBe(true)
  })

  it('contains the protection section', () => {
    const protectionSection = wrapper.find('h3')
    expect(protectionSection.text()).toBe('Protection client et artisan')
  })

  it('has a link to learn more', () => {
    const learnMoreLink = wrapper.find('router-link')
    expect(learnMoreLink.attributes('to')).toBe('/securitravaux')
    expect(learnMoreLink.text()).toContain('En savoir plus')
  })
})
