<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a
              class="nav-item nav-link active"
              id="nav-home-tab"
              data-toggle="tab"
              href="#nav-home"
              role="tab"
              aria-controls="nav-home"
              aria-selected="true"
            >อัพโหลดเอกสาร</a>
            <a
              class="nav-item nav-link"
              id="nav-profile-tab"
              data-toggle="tab"
              href="#nav-profile"
              role="tab"
              aria-controls="nav-profile"
              aria-selected="false"
            >ผลการยื่น</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div
            class="tab-pane fade show active"
            id="nav-home"
            role="tabpanel"
            aria-labelledby="nav-home-tab"
          >
            <div>
              <label>Passport</label>
              <vue-dz mytype="passport"></vue-dz>
            </div>
            <div>
              <label>Transcript</label>
              <vue-dz mytype="transcript"></vue-dz>
            </div>
            <div>
              <label>CU</label>
              <vue-dz mytype="CU"></vue-dz>
            </div>
            <div>
              <label>SOP</label>
              <vue-dz mytype="SOP"></vue-dz>
            </div>
            <div>
              <label>Recommendation 1</label>
              <vue-dz mytype="rec1"></vue-dz>
            </div>
            <div>
              <label>Recommendation 2</label>
              <vue-dz mytype="rec2"></vue-dz>
            </div>
            <button class="btn btn-success form-control mt-3">บันทึก</button>
          </div>
          <div
            class="tab-pane fade"
            id="nav-profile"
            role="tabpanel"
            aria-labelledby="nav-profile-tab"
          >...</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      
    }
  }
};
</script>