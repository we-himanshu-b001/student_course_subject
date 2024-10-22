<script setup>
import {onMounted, ref, watch} from "vue";
import { useCourseStore } from '../../stores/store-courses';
import { useSubjectStore } from '../../stores/store-subjects';

import VhField from './../../vaahvue/vue-three/primeflex/VhField.vue'
import {useRoute} from 'vue-router';

const sub = useSubjectStore();
const store = useCourseStore();
const route = useRoute();

onMounted(async () => {
    /**
     * Fetch the record from the database
     */
    if((!store.item || Object.keys(store.item).length < 1)
            && route.params && route.params.id)
    {
        await store.getItem(route.params.id);

    }
    await sub.getList();
    if (!store.item.subject_id && sub.list.data.length > 0) {
        store.item.subject_id = sub.item.subject_id;
    }
    await store.getFormMenu();
});

//--------form_menu
const form_menu = ref();
const toggleFormMenu = (event) => {
    form_menu.value.toggle(event);
};
// console.log(sub);
//--------/form_menu

</script>
<template>

    <div class="col-6" >

        <Panel class="is-small">

            <template class="p-1" #header>


                <div class="flex flex-row">
                    <div class="p-panel-title">
                        <span v-if="store.item && store.item.id">
                            Update
                        </span>
                        <span v-else>
                            Create
                        </span>
                    </div>

                </div>


            </template>

            <template #icons>


                <div class="p-inputgroup">

                    <Button class="p-button-sm"
                            v-tooltip.left="'View'"
                            v-if="store.item && store.item.id"
                            data-testid="courses-view_item"
                            @click="store.toView(store.item)"
                            icon="pi pi-eye"/>

                    <Button label="Save"
                            class="p-button-sm"
                            v-if="store.item && store.item.id"
                            data-testid="courses-save"
                            @click="store.itemAction('save')"
                            icon="pi pi-save"/>

                    <Button label="Create & New"
                            v-else
                            @click="store.itemAction('create-and-new')"
                            class="p-button-sm"
                            data-testid="courses-create-and-new"
                            icon="pi pi-save"/>


                    <!--form_menu-->
                    <Button
                        type="button"
                        @click="toggleFormMenu"
                        class="p-button-sm"
                        data-testid="courses-form-menu"
                        icon="pi pi-angle-down"
                        aria-haspopup="true"/>

                    <Menu ref="form_menu"
                          :model="store.form_menu_list"
                          :popup="true" />
                    <!--/form_menu-->


                    <Button class="p-button-primary p-button-sm"
                            icon="pi pi-times"
                            data-testid="courses-to-list"
                            @click="store.toList()">
                    </Button>
                </div>

            </template>


            <div v-if="store.item" class="mt-2">

                <Message severity="error"
                         class="p-container-message mb-3"
                         :closable="false"
                         icon="pi pi-trash"
                         v-if="store.item.deleted_at">

                    <div class="flex align-items-center justify-content-between">

                        <div class="">
                            Deleted {{store.item.deleted_at}}
                        </div>

                        <div class="ml-3">
                            <Button label="Restore"
                                    class="p-button-sm"
                                    data-testid="articles-item-restore"
                                    @click="store.itemAction('restore')">
                            </Button>
                        </div>

                    </div>

                </Message>


                <VhField label="Name">
                    <div class="p-inputgroup">
                        <InputText class="w-full"
                                   placeholder="Enter the name"
                                   name="courses-name"
                                   data-testid="courses-name"
                                   @update:modelValue="store.watchItem"
                                   v-model="store.item.name" required/>
                        <div class="required-field hidden"></div>
                    </div>
                </VhField>

                <VhField label="Class">
                    <div class="p-inputgroup">
<!--                        <InputNumber class="w-full"-->
<!--                                   placeholder="Enter the Class"-->
<!--                                   name="courses-class"-->
<!--                                   data-testid="courses-class"-->
<!--                                   v-model="store.item.class" required/>-->
                        <InputNumber class="w-full" name="courses-class" data-testid="courses-class" placeholder="Enter the Class" v-model="store.item.class" inputId="minmax" :min="1" :max="12" mode="decimal" fluid required/>
                        <div class="required-field hidden"></div>
                    </div>
                </VhField>

                <VhField label="Subject">
                    <div class="p-inputgroup">
                        <select v-if="sub.list && sub.list.data"
                                class="w-full p-inputtext"
                                name="courses-subject"
                                data-testid="courses-subject"
                                v-model="store.item.subject_id" required>
                            <option v-for="option in sub.list.data" :key="option.id" :value="option.id">
                                {{ option.name }}
                            </option>
                        </select>
                        <div class="required-field hidden"></div>
                    </div>
                </VhField>


                <!--                <VhField label="Subject">-->
<!--                    <div class="p-inputgroup">-->
<!--                        <select v-if="sub.item"-->
<!--                            class="w-full p-inputtext"-->
<!--                            name="courses-subject"-->
<!--                            data-testid="courses-subject"-->
<!--                            v-model="store.item.subject_id" required>-->
<!--                            <option v-for="option in sub.item.data" :key="option.id" :value="option.id">-->
<!--                                {{ option.name }}-->
<!--                            </option>-->
<!--&lt;!&ndash;                           <Dropdown>&ndash;&gt;-->

<!--&lt;!&ndash;                           </Dropdown>&ndash;&gt;-->
<!--&lt;!&ndash;                            <option v-for="subject in sub.item.data"&ndash;&gt;-->
<!--&lt;!&ndash;                                :key="subject.id"&ndash;&gt;-->
<!--&lt;!&ndash;                                :value="subject.id">&ndash;&gt;-->
<!--&lt;!&ndash;                                {{ subject.name }}&ndash;&gt;-->
<!--&lt;!&ndash;                            </option>&ndash;&gt;-->
<!--                        </select>-->
<!--                        <div class="required-field hidden"></div>-->
<!--                    </div>-->
<!--                </VhField>-->



            </div>
        </Panel>

    </div>

</template>
