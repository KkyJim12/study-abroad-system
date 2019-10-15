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
                                v-model="value"
                                tagPosition="bottom"
                                :hideSelected="true"
                                tag-placeholder="เลือกมหาลัยนี้"
                                placeholder="กรุณาเลือกมหาลัย"
                                selectLabel="เลือกมหาลัยนี้"
                                openDirection="top"
                                label="name"
                                track-by="code"
                                :options="options"
                                :multiple="true"
                                :taggable="true"
                                @tag="addTag"
                            ></multiselect>
                        </div>

                        <div class="mt-2">
                            <label class="typo__label">คอร์สเรียนที่สนใจ</label>
                            <multiselect
                                v-model="value"
                                tagPosition="bottom"
                                :hideSelected="true"
                                tag-placeholder="เลือกมหาลัยนี้"
                                placeholder="กรุณาเลือกมหาลัย"
                                selectLabel="เลือกมหาลัยนี้"
                                openDirection="top"
                                label="name"
                                track-by="code"
                                :options="options"
                                :multiple="true"
                                :taggable="true"
                                @tag="addTag"
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
    data() {
        return {
            value: null,
            options: [
                { name: "Vue.js", code: "vu" },
                { name: "Javascript", code: "js" },
                { name: "Open Source", code: "os" }
            ]
        };
    },
    methods: {
        addTag(newTag) {
            const tag = {
                name: newTag,
                code:
                    newTag.substring(0, 2) +
                    Math.floor(Math.random() * 10000000)
            };
            this.options.push(tag);
            this.value.push(tag);
        }
    }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
