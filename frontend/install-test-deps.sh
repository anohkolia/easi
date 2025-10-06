#!/bin/bash

# Script pour installer les dépendances de test
echo "Installation des dépendances de test..."

# Installation des dépendances de développement
npm install --save-dev @vue/test-utils@^2.4.6 jsdom@^26.0.0 vitest@^3.0.5

# Installation des types TypeScript
npm install --save-dev @types/jsdom@^21.1.0

echo "Dépendances de test installées avec succès!"
