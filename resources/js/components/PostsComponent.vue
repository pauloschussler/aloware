<script setup>
// import CommentsComponent from "@/Components/CommentsComponent.vue";
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
      class="px-4 max-w-[1000px] mx-auto mt-10"
      v-for="post in posts.data"
      :key="post.id"
    >
      <h2 class="text-2xl font-bold mb-2">{{ post.title }}</h2>
      <p class="text-base leading-6">{{ post.content }}</p>
      <p class="text-sm leading-6">Created at:{{ post.created_at }}</p>
      <h5 class="my-5 text-center mb-2">Comments</h5>
      <div class="border mt-2">
        <div
          id="Comments"
          class="px-4 max-w-[1000px] mx-auto mt-10"
          v-for="comment in post.comments"
          :key="comment.id"
        >
          <div class="post-comment">
            <div class="flex items-center mb-2">
              <img
                src="/images/user.jpeg"
                alt="User Icon"
                class="w-8 h-8 mr-2"
              />
              <p class="text-sms font-bold">{{ comment.user }}</p>
            </div>
            <p class="text-base leading-6">{{ comment.comment }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>