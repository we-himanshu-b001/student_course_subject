let routes= [];

import dashboard from "./vue-routes-dashboard";
import subject from "./vue-routes-subjects";
import course from "./vue-routes-courses";
import taxonomies from "./vue-routes-taxonomies";

routes = routes.concat(taxonomies);
routes = routes.concat(course);
routes = routes.concat(dashboard);
routes = routes.concat(subject);

export default routes;
