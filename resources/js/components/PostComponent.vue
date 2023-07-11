<script setup>
//import InputError from "@/Components/InputError.vue";
//import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";
import { ref, onMounted, toRefs } from "vue";

const form = useForm({
  message: "",
});

const props = defineProps({ posts: Object });
const { posts } = toRefs(props);
</script>

<template>
  <div class="blog-post">
    <div
      id="Posts"
      class="px-4 max-w-[600px] mx-auto mt-10"
      v-for="post in posts.data"
      :key="post.id"
    >
      <h2 class="text-2xl font-bold mb-2">{{ post.title }}</h2>
      <p class="text-base leading-6">{{ post.content }}</p>
      <p class="text-sm leading-6">Created at:{{ post.created_at }}</p>
    </div>
  </div>
</template>