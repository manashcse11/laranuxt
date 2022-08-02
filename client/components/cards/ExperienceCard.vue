<template>
  <li class="col-span-1 bg-white rounded-lg shadow">
    <div class="w-full flex items-center justify-between p-6 space-x-6">
      <div class="flex-1 truncate">
        <div class="flex items-center space-x-3">
          <h3 class="text-gray-900 text-sm leading-5 font-medium truncate">
            {{ experience.job_title }}
          </h3>
          <span
            v-if="!experience.end_date"
            class="flex-shrink-0 inline-block px-2 text-teal-800 text-xs leading-4 font-medium bg-green-100 rounded-full py-0.5"
          >
            Current position
          </span>
        </div>
        <p class="mt-1 text-gray-500 text-sm leading-5 truncate">
          {{ experience.company_name }}
        </p>
      </div>
    </div>
  </li>
</template>

<script lang="ts">
import { PropType } from '@nuxtjs/composition-api'
import Vue from 'vue'
import { Experience } from '@/client/types/api'
export default Vue.extend({
  props: {
    experience: {
      type: Object as PropType<Experience>,
      required: true,
    },
  },
  computed: {
  },
})
</script>
