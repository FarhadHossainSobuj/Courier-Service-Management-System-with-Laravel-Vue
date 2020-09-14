<template>
  <div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 mx-auto mt-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="addStudent">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student Email</label>
                    <input
                      v-model="form.email"
                      type="email"
                      class="form-control"
                      :class="{'is-invalid':form.errors.has('email')}"
                      id="exampleInputEmail1"
                      placeholder="Enter email"
                    />
                    <has-error :form="form" field="email"></has-error>
                  </div>

                  <!-- roll  -->
                  <div class="form-group">
                    <label for="roll">Roll</label>
                    <input
                      type="text"
                      v-model="form.roll"
                      class="form-control"
                      :class="{'is-invalid':form.errors.has('roll')}"
                      id="roll"
                      placeholder="Enter Student Roll"
                    />
                    <has-error :form="form" field="roll"></has-error>
                  </div>

                  <!-- reg no  -->
                  <div class="form-group">
                    <label for="reg">Reg No.</label>
                    <input
                      type="text"
                      v-model="form.reg"
                      class="form-control"
                      :class="{'is-invalid':form.errors.has('reg')}"
                      id="reg"
                      placeholder="Enter Student Reg"
                    />
                    <has-error :form="form" field="reg"></has-error>
                  </div>

                  <!-- department  -->
                  <div class="form-group">
                    <label for="reg">Student Department</label>
                    <select
                      name
                      id="department"
                      v-model="form.department"
                      class="form-control"
                      :class="{'is-invalid':form.errors.has('department')}"
                    >
                      <option value selected disabled>Select Department</option>
                      <option value="computer">computer</option>
                      <option value="civil">civil</option>
                      <option value="electrical">electrical</option>
                      <option value="electronics">electronics</option>
                    </select>
                    <has-error :form="form" field="department"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        email: "",
        roll: "",
        reg: "",
        department: "",
      }),
    };
  },
  methods: {
    addStudent() {
      this.form.post("/api/admin/students");
    },
  },
};
</script>