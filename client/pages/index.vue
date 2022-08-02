<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <div class="m-8 flex items-center justify-center">
      <Logo />
    </div>
    <button id="show-add-experience-modal" @click="showAddExperienceModal = true">Add Experience</button>
    <modal :show="showAddExperienceModal" @close="showAddExperienceModal = false">
<!--      <template #header>-->
<!--        <h3>custom header</h3>-->
<!--      </template>-->
    </modal>

    <ul v-if="experiences.length &gt; 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <experience-card v-for="(experience, index) in experiences" :key="index" :experience="experience" />
    </ul>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import Modal from '../components/modals/Modal'
import { Experiences } from '@/types/api'
export default Vue.extend({
  components: {
    Modal,
  },
  data () {
    const experiences:Experiences = []
    const count:number = 9

    return {
      experiences,
      count,
      showAddExperienceModal: false,
    }
  },
  mounted () {
    this.get(this.count)
    console.log('test')
  },
  methods: {
    async get (count: number): Promise<void> {
      await this.$sleep(2000)
      this.experiences = (
        await this.$axios.get('experiences', { params: { count } })
      ).data.data as Experiences
    },
    total (count: number): void {
      this.experiences = []
      this.count = count
      this.get(this.count)
    },
  },
})
</script>
