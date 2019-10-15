<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10">
                <div>
                    <h1>กรอกข้อมูล</h1>
                    <hr />
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ชื่อจริง</label>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="กรุณากรอกชื่อจริง"
                            />

                            <small id="emailHelp" class="form-text text-muted"
                                >กรุณากรอกเป็นภาษาไทย</small
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">นามสกุล</label>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="กรุณากรอกนามสกุล"
                            />

                            <small id="emailHelp" class="form-text text-muted"
                                >กรุณากรอกเป็นภาษาไทย</small
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ชื่อเล่น</label>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="กรุณากรอกชื่อเล่น"
                            />

                            <small id="emailHelp" class="form-text text-muted"
                                >กรุณากรอกเป็นภาษาไทย</small
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">วันเกิด</label>

                            <input type="date" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                >วันหมดอายุ Passport</label
                            >

                            <input type="date" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">เบอร์โทร</label>

                            <input
                                type="tel"
                                class="form-control"
                                placeholder="กรุณากรอกเบอร์โทร"
                            />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">อีเมลล์</label>

                            <input
                                type="email"
                                class="form-control"
                                placeholder="กรุณากรอกอีเมลล์"
                            />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">GPA</label>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="กรุณากรอก GPA"
                            />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">IELTS</label>

                            <input
                                type="number"
                                class="form-control"
                                placeholder="กรุณากรอกคะแนน IELTS"
                            />
                        </div>
                        <div>
                            <label class="typo__label">มหาลัยทีสนใจ</label>
                            <multiselect
                                v-model="collegeValue"
                                :hideSelected="true"
                                tag-placeholder="เลือกมหาลัยนี้"
                                placeholder="กรุณาเลือกมหาลัย"
                                selectLabel="เลือกมหาลัยนี้"
                                openDirection="top"
                                label="name"
                                track-by="code"
                                :options="collegeOptions"
                                :multiple="true"
                                :taggable="true"
                                @tag="addCollegeTag"
                            ></multiselect>
                        </div>

                        <div class="mt-2">
                            <label class="typo__label">คอร์สเรียนที่สนใจ</label>
                            <multiselect
                                v-model="courseValue"
                                :hideSelected="true"
                                tag-placeholder="เลือกคอร์สเรียนนี้"
                                placeholder="กรุณาเลือกคอร์สเรียน"
                                selectLabel="เลือกคอร์สเรียนนี้"
                                openDirection="top"
                                label="name"
                                track-by="code"
                                :options="courseOptions"
                                :multiple="true"
                                :taggable="true"
                                @tag="addCourseTag"
                            ></multiselect>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary form-control mt-3"
                        >
                            ส่งข้อมูล
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    components: {
        Multiselect
    },
    mounted() {
        this.getCollegeList();
        this.getCourseList();
    },
    data() {
        return {
            collegeList: { name: "", code: "" },
            collegeValue: null,
            courseValue: null,
            collegeOptions:[{name:'',code:''}],
            courseOptions:[],
        };
    },
    methods: {
        addCollegeTag(newTag) {
            const tag = {
                name: newTag,
                code:
                    newTag.substring(0, 2) +
                    Math.floor(Math.random() * 10000000)
            };
            this.collegeOptions.push(tag);
            this.collegeValue.push(tag);
        },
        addCourseTag(newTag) {
            const tag = {
                name: newTag,
                code:
                    newTag.substring(0, 2) +
                    Math.floor(Math.random() * 10000000)
            };
            this.courseOptions.push(tag);
            this.courseValue.push(tag);
        },
        getCollegeList() {
            axios.get("/api/college").then(response => {
                this.collegeOptions=response.data;
            });
        },
        getCourseList() {
            axios.get('/api/course').then(response=>{
                this.courseOptions=response.data;
            });
        }
    }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
