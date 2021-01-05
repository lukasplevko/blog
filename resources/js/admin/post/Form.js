import AppForm from "../app-components/Form/AppForm";

Vue.component("post-form", {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                title: "",
                slug: "slug123slug",
                perex: "",
                text: "",
                published_at: "",
                enabled: false,
                views: 0
            },
            mediaCollections: ["gallery", "thumbnail"]
        };
    }
});
