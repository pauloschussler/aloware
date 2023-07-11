<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
  <div id="MainLayout">
    <div
      class="flex lg:justify-between bg-white h-full w-[100%-280px] xl:pl-[280px] lg:pl-[100px] overflow-auto"
    >
      <div
        class="mx-auto md:pt-6 pt-20"
        :class="$page.url === '/' ? 'lg:w-10/12 w-full' : 'max-w-[1200px]'"
      >
        <main>
          <slot />
        </main>
      </div>
    </div>
  </div>
</template>
