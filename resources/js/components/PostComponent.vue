<script setup>
//import InputError from "@/Components/InputError.vue";
//import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";

const form = useForm({
  message: "",
});
</script>

<template>
  <div class="blog-post">
    <h2 class="text-2xl font-bold mb-2">Título</h2>
    <p class="text-base leading-6">Conteúdo</p>
  </div>
</template>