<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Painel Principal
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            Seja bem-vindo a ECORBAN!
            <div
              class="p-6 bg-white border-b border-gray-200 max-w-2xl mx-auto"
            >
              <img
                src="/images/ecorban-logo.png"
                alt="logo"
                style="width= 150px; height:100px;"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
