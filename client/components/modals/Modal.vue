<template>
  <Transition name="modal">
    <div v-if="show" class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <form v-on:submit.prevent="addExperience" class="w-full">
            <TextInput v-model="job_title" id="job-title" label="Job title" placeholder="Your job title" :error="this.errors.job_title ? this.errors.job_title[0] : ''"/>
            <TextInput v-model="company_name" id="company-name" label="Company name" placeholder="Your company name" :error="this.errors.company_name ? this.errors.company_name[0] : ''"/>
            <TextInput v-model="company_web_url" id="company-web-url" label="Company web url" placeholder="Your company web url" :error="this.errors.company_web_url ? this.errors.company_web_url[0] : ''"/>
            <TextInput v-model="city" id="city" label="City" placeholder="Your city" :error="this.errors.city ? this.errors.city[0] : ''"/>
            <TextInput v-model="country" id="country" label="Country" placeholder="Your country" :error="this.errors.country ? this.errors.country[0] : ''"/>
            <TextInput v-model="start_date" id="start-date" label="Start date" placeholder="Your start date" :error="this.errors.start_date ? this.errors.start_date[0] : ''"/>

            <div id="button" class="flex my-5">
              <button type="submit" class="px-8 py-4 mr-5 bg-green-600 rounded-lg text-green-100">
                <div class="flex flex-row items-center justify-center">
                  <div class="font-bold">Add</div>
                </div>
              </button>
              <button type="button" class="px-8 py-4 bg-red-600 rounded-lg text-red-100" @click="$emit('close')">
                <div class="flex flex-row items-center justify-center">
                  <div class="font-bold">Close</div>
                </div>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </Transition>
</template>
<script>
import TextInput from '@/components/forms/TextInput.vue';
export default {
  components: {
    TextInput,
  },
  props: {
    show: Boolean,
  },
  data () {
    return {
      errors: [],
      job_title: '',
      company_name: '',
      company_web_url: '',
      city: '',
      country: '',
      start_date: '',
    }
  },
  methods: {
    addExperience () {
      this.$axios.post('experiences', {
        job_title: this.job_title,
        company_name: this.company_name,
        company_web_url: this.company_web_url,
        city: this.city,
        country: this.country,
        start_date: this.start_date,
      }).then((response) => {
        this.$parent.experiences.push(response.data.data)
        this.$emit('close')
      }).catch((error) => {
        this.errors = error.response.data.errors
      })
    },
  },
}
</script>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 800px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
