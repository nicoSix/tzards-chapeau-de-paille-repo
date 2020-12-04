<template>
  <!-- HEAD -->
  <div>
    <div>
      <b-navbar toggleable="lg" type="dark" variant="info">
        <!-- <b-navbar-brand href="#">
        <img v-bind:src="image" class="d-inline-block align-top" alt="Logo">
        Lifesaver <small><i>by T'zards & Chapeau de paille</i></small>
        </img>
      </b-navbar-brand> -->
        <b-navbar-brand>
          Lifesaver <small><i>by T'zards & Chapeau de paille</i></small>
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item href="#"
              ><b-icon icon="bell"></b-icon> Alerts</b-nav-item
            >
            <b-nav-item href="#"
              ><b-icon icon="book"></b-icon> My sessions</b-nav-item
            >
          </b-navbar-nav>
          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown right v-if="not_submit">
              <template #button-content>
                <em><b-icon icon="user"></b-icon> User</em>
              </template>
              <b-dropdown-item href="#">
                <b-button v-b-modal.modal1>Sign Up!</b-button>
              </b-dropdown-item>
              <b-dropdown-item href="#">
                <b-button @click="signOut()">Sign Out!</b-button>
              </b-dropdown-item>
            </b-nav-item-dropdown>
            <b-navbar-brand href="#" v-if="!not_submit" right>
              <img src="https://placekitten.com/g/30/30" alt="Kitten" />
              {{ text_name }}
            </b-navbar-brand>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </div>
    <!-- HEAD -->
    <div>
      <br />
      <b-container>
        <b-jumbotron v-if="start">
          <template #header>Wanna 🏄 with us?</template>

          <template #lead> </template>

          <hr class="my-4" />

          <p>
            With Lifesaver, you can join us for better surfing and cleaner
            oceans. Developed for
            <a url="https://surfrider.eu/">Surfrider</a> during
            <i>La Nuit de l'Info</i>, this application allows you to save your
            surf sessions through our mobile app, and consult then share them on
            our website! You can also alert us on anomalies that occured during
            your surfing. Through this system, every surfer can check alerts and
            be warned about threats in their spots. Going further, we want to
            aggregate your alerts to warn officials about the dangers that
            threatens our oceans and our spots.
          </p>

          <b-button variant="secondary" href="/sessions">
            Go to my surf sessions
          </b-button>
          <b-button variant="info" href="https://surfrider.eu/">
          About Surfrider
          </b-button>
        </b-jumbotron>
        <b-jumbotron v-if="!start">
          <template #header>TEST</template>

          <template #lead> </template>

          <hr class="my-4" />

          <b-card v-for="se in sessions" :key="se.idSessionSurf"
              v-bind:title="se.idSessionSurf"
              img-src="https://picsum.photos/600/300/?image=25"
              img-alt="Image"
              img-top
              tag="article"
              style="max-width: 20rem;"
              class="mb-2"
            >
            <b-card-text>
              {{se.avisSession}}
              {{se.frequentation}}
            </b-card-text>

            <b-button href="#" variant="primary">Go somewhere</b-button>
          </b-card>
        </b-jumbotron>
      </b-container>
    </div>

    <!--<div>
    <b-progress :value="value" :max="max" show-progress animated></b-progress>
    <b-progress class="mt-2" :max="max" show-value>
      <b-progress-bar :value="value * (6 / 10)" variant="success"></b-progress-bar>
      <b-progress-bar :value="value * (2.5 / 10)" variant="warning"></b-progress-bar>
      <b-progress-bar :value="value * (1.5 / 10)" variant="danger"></b-progress-bar>
    </b-progress>

    <b-button class="mt-3" @click="randomValue">Click me</b-button>
  </div>-->
    <b-modal
      id="modal1"
      title="Sign-In"
      @ok="handleOk"
      @hidden="close"
      @show="resetModal"
    >
      <b-input-group class="mb-2">
        <b-form-input
          placeholder="Enter your name"
          v-model="text_name"
        ></b-form-input>
        <b-form-input
          placeholder="Enter your pw"
          v-model="text_pw"
        ></b-form-input>
      </b-input-group>
    </b-modal>
  </div>
</template>

<script>
//import image from "../../public/assets/images/logo.jpg";
import { VBModal } from "bootstrap-vue";

export default {
  data() {
    return {
      value: 45,
      max: 100,
      text_name: "",
      text_pw: "",
      show_modal: false,
      not_submit: true,
      start: true,
      sessions: []
    };
  },
  created: function () {
    this.sessions.push({
      idSessionSurf : 123,
      dateDebut : "2012-04-23T18:25:43.511Z",
      dateFin : "2012-04-23T20:25:43.511Z",
      avisSession : 4.5,
      frequentation : "Peu fréquenté"
    });
    this.sessions.push({
      idSessionSurf : 222,
      dateDebut : "2012-04-23T18:25:43.511Z",
      dateFin : "2012-04-23T20:25:43.511Z",
      avisSession : 4.5,
      frequentation : "Peu fréquenté"
    });
    this.sessions.push({
      idSessionSurf : 2345,
      dateDebut : "2012-04-23T18:25:43.511Z",
      dateFin : "2012-04-23T20:25:43.511Z",
      avisSession : 4.5,
      frequentation : "Peu fréquenté"
    });
  },
  methods: {
    randomValue() {
      this.value = Math.random() * this.max;
    },
    hello() {
      show_modal = !show_modal;
    },
    handleOk(bvModalEvt) {
      /* // Prevent modal from closing
      bvModalEvt.preventDefault() */
      // Trigger submit handler
      this.handleSubmit();
    },
    handleSubmit() {
      this.not_submit = !this.not_submit;
      console.log("Submit" + this.text_pw + this.text_name);
    },
    resetModal() {
      this.text_name = "";
      this.text_pw = "";
    },
    close() {
      this.start = false
    },
  },
  computed: {
    show: function () {
      return this.show_modal;
    },
    show: function () {
      return this.show_modal;
    },
    state() {
      return true;
    },
  },
  directives: {
    "b-modal": VBModal,
  },
};
</script>

<style scoped>
</style>