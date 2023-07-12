<script setup>
import { useForm, Head } from "@inertiajs/vue3";
import { ref, onMounted, toRefs } from "vue";

const form = useForm({
  message: "",
});

const props = defineProps({ comments: Object });
const { comments } = toRefs(props);
</script>

<template>
  <h5 class="my-5 text-center mb-2">Comments</h5>
  <div class="border mt-2">
    <div
      id="Comments"
      class="px-4 max-w-[1000px] mx-auto mt-10"
      v-for="comment in comments"
      :key="comment.id"
    >
      <div class="post-comment">
        <h2 class="text-2xl font-bold mb-2">{{ comment.comment }}</h2>
        <p class="text-base leading-6">teste</p>
      </div>
    </div>
  </div>
</template>