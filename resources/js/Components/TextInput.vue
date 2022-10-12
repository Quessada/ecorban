<script setup>
import { onMounted, ref } from "vue";

import masks from "@/utils/masks";

const { mask } = defineProps(["modelValue", "mask"]);

defineEmits(["update:modelValue"]);

const input = ref(null);

const applyMask = (e) => {
  const { value } = e.target;

  if (hasMaskApplied()) {
    e.target.value = masks[mask](value);
  }
};

onMounted(() => {
  if (input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
  if (hasMaskApplied()) {
    input.value.value = masks[mask](input.value.value);
  }
});

const hasMaskApplied = () => {
  return mask && masks[mask];
};
</script>

<template>
  <input
    class="
      border-gray-300
      focus:border-indigo-300
      focus:ring
      focus:ring-indigo-200
      focus:ring-opacity-50
      rounded-md
      shadow-sm
    "
    :value="modelValue"
    @keyup="applyMask"
    @input="$emit('update:modelValue', $event.target.value)"
    ref="input"
  />
</template>
