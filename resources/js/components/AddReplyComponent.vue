<script>
import { ref, provide } from "vue";
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";

export default {
  setup(props) {
    const isCollapsed = ref(true);
    const form = useForm({
      comment: "",
      user: "",
      parent_comment_id: props.parent_comment_id,
    });

    const toggleCollapse = () => {
      isCollapsed.value = !isCollapsed.value;
    };

    provide("parent_comment_id", props.parent_comment_id);

    return {
      isCollapsed,
      form,
      toggleCollapse,
    };
  },
  props: {
    parent_comment_id: {
      type: String,
      required: true,
    },
  },
  components: {
    PrimaryButton,
    InputError,
  },
};
</script>

<template>
  <div class="py-5">
    <a
      href="#"
      @click.prevent
      @click="toggleCollapse"
      class="text-sm font-bold text-blue-600 dark:text-gray-500 hover:underline"
    >
      Reply
    </a>
    <div v-if="!isCollapsed" class="mt-4 p-4 bg-gray-100">
      <form
        @submit.prevent="
          form.post(route('replies.store'), { onSuccess: () => form.reset() })
        "
      >
        <textarea
          v-model="form.comment"
          placeholder="What are you thinking?"
          class="my-1 w-full border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
        <InputError :message="form.errors.comment" class="mt-1" />
        <input
          v-model="form.user"
          placeholder="User name"
          class="my-1 py-1 w-full border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        />
        <InputError :message="form.errors.user" class="mt-1" />
        <input v-model="form.parent_comment_id" type="hidden" />
        <PrimaryButton class="mt-4">Reply</PrimaryButton>
      </form>
    </div>
  </div>
</template>
