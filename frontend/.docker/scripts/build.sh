#!/usr/bin/env bash

chown -R node package.json
npm install
npm install -g vite@latest
chown -R node *
npm run build
npm run preview