<script setup>
import AddCommentComponent from "@/Components/AddCommentComponent.vue";
import AddReplyComponent from "@/Components/AddReplyComponent.vue";
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
      class="px-4 mx-auto mt-10"
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
          class="px-4 mx-auto mt-10"
          v-for="comment in post.comments"
          :key="comment.id"
        >
          <div class="post-comment my-4">
            <div class="flex items-center mb-2">
              <img
                src="/images/user.jpeg"
                alt="User Icon"
                class="w-8 h-8 mr-2"
              />
              <p class="text-sms font-bold">{{ comment.user }}</p>
            </div>
            <p class="text-base leading-6">{{ comment.comment }}</p>
            <div
              id="Replies"
              class="px-8 mx-auto mt-10"
              v-for="replie in comment.replies"
              :key="replie.id"
            >
              <div class="flex items-center mb-2">
                <img
                  src="/images/user.jpeg"
                  alt="User Icon"
                  class="w-8 h-8 mr-2"
                />
                <p class="text-sms font-bold">{{ replie.user }}</p>
              </div>
              <p class="text-base leading-6">{{ replie.comment }}</p>
            </div>
            <div>
              <template v-if="comment.replies.length < 3">
                <AddReplyComponent :parent_comment_id="comment.id" />
              </template>
            </div>
          </div>
          <div class="border-b border-b-gray-100 mt-2"></div>
        </div>

        <div class="border-b border-b-gray-200 mt-2"></div>

        <AddCommentComponent />
      </div>
    </div>
  </div>
</template>