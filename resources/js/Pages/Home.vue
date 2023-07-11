<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Navbar from "@/Components/NavbarComponent.vue";
import PostComponent from "@/Components/PostComponent.vue";

import { useForm, Head } from "@inertiajs/vue3";
import { ref, onMounted, toRefs } from "vue";

const props = defineProps({ posts: Object });
const { posts } = toRefs(props);
</script>

<template>
  <head title="Aloware" />

  <Navbar></Navbar>
  <MainLayout>
    <div class="text-black">
      <PostComponent :posts="posts" />
      <div class="border-b border-b-gray-800 mt-2"></div>
    </div>
  </MainLayout>
</template>

<style>
/* Additional styles if needed */
</style>
