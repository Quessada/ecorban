<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <div
    class="
      min-h-screen
      flex flex-col
      sm:justify-center
      items-center
      pt-6
      sm:pt-0
      bg-gray-100
    "
  >
    <div>
      <Link href="/">
        <img
          src="/images/ecorban-logo.png"
          alt="logo"
          style="width= 30px; height:35px;"
        />
      </Link>
    </div>

    <div
      class="
        w-full
        sm:max-w-md
        mt-6
        px-6
        py-4
        bg-white
        shadow-md
        overflow-hidden
        sm:rounded-lg
      "
    >
      <slot />
    </div>
  </div>
</template>
