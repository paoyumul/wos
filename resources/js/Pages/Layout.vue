<template>
    <app-header></app-header>
    <main>
        <div class="container">
            <slot></slot>
        </div>
    </main>
</template>

<script setup>
import AppHeader from './Header';
</script>
