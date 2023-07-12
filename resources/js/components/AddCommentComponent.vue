<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import { useForm, Head } from "@inertiajs/vue3";

const form = useForm({
  comment: "",
  user: "",
  post_id: 1,
});
</script>

<template>
  <div class="blog-comment">
    <div class="mx-auto p-4 sm:p-6 lg:p-8">
      <form
        @submit.prevent="
          form.post(route('comments.store'), { onSuccess: () => form.reset() })
        "
      >
        <textarea
          v-model="form.comment"
          placeholder="What are you thinking?"
          class="my-1 w-full border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
        <InputError :message="form.errors.comment" class="mt-2 space-x-2" />
        <input
          v-model="form.user"
          placeholder="User name"
          class="my-1 py-1 w-full border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        />
        <InputError :message="form.errors.user" class="mt-2" />
        <input v-model="form.post_id" type="hidden" />
        <PrimaryButton class="mt-4">Comment</PrimaryButton>
      </form>
    </div>
  </div>
</template>