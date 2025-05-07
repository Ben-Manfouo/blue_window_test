First of all, I would like to thank you for the opportunity you have given me through this test—the opportunity to join the Blue Window technical team as a Fullstack Developer.

It was with great pleasure that I took part in this test, and I would like to briefly explain the context in which I approached it.

As requested, the goal was to build a RESTful API on the backend that implements CRUD operations for the Brand entity. I focused the CRUD implementation on the database elements mentioned in the specifications: brand_id, brand_name, brand_image, and rating. In the full structure of the brands table, I included additional fields to support the desired frontend rendering, but the core CRUD operations strictly handle only those four fields.

Additionally, in the brand listing feature, I assumed the presence of a specific header (CF-IPCountry) that would be available when the site is hosted on Cloudflare. This header allows detection of the user’s country. If the header is present, only brands active in that country are displayed. If the country is not provided, all brands are shown.

To simulate this behavior on the frontend, I added a dropdown that lets users manually select a country, emulating how the application would behave in a real-world context. I also implemented pagination to allow for sequential browsing of the data as needed.

Furthermore, as a potential enhancement, I considered adding a search bar to allow users to filter brands by name. This could be explored as a future improvement.

For deliverables, I have shared the Git repository link https://github.com/Ben-Manfouo/blue_window_test.git. You can clone it and refer to the DOCKER_README.md file for detailed instructions on how to run the project using Docker and view the results.

Once again, thank you for the opportunity. I remain available for any further information or clarification you may need.

Best regards,
Ben-oni Manfouo
