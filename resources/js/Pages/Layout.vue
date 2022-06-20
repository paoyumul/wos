<template>
    <app-header></app-header>
    <main>
        <div class="container py-4">
            <slot></slot>
        </div>
    </main>
</template>

<script setup>
import AppHeader from './Header';
</script>
