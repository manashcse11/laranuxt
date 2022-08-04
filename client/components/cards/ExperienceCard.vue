<template>
  <div class="w-full flex items-center justify-between p-6 space-x-6">
    <div class="flex-1 truncate">
      <div class="flex items-center space-x-3">
        <h3 class="text-gray-900 text-lg leading-5 font-medium truncate">
          {{ experience.job_title }}
        </h3>
        <span
          v-if="!experience.end_date"
          class="flex-shrink-0 inline-block px-2 text-teal-800 text-xs leading-4 font-medium bg-green-100 rounded-full py-0.5"
        >
          Current position
        </span>
      </div>
      <div v-if="experience.company_web_url" class="mt-1 text-sm pt-1 font-bold">
        <a class="text-blue-600 hover:text-blue-800" :href="experience.company_web_url">{{ experience.company_name }}</a>
      </div>
      <div v-if="!experience.company_web_url" class="mt-1 text-gray-500 text-sm leading-5 truncate pt-1 font-bold">
        {{ experience.company_name }}
      </div>
      <div class="mt-1 text-gray-500 text-sm leading-5 truncate pb-1">
        {{ experience.city }}, {{ experience.country }}
      </div>
      <div class="text-sm py-1 text-gray-500">
        <span>{{ experience.start_date }}</span>
        <span v-if="experience.end_date"> to {{ experience.end_date }}</span>
        <span v-if="!experience.end_date"> to Present</span>
      </div>
      <div class="text-sm py-1 text-block leading-6 text-16" v-html="experience.responsibilities"></div>
    </div>
  </div>
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
