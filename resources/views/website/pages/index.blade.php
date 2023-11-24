
@extends('website.layout.app')

@section('content')

    <!-- ================> Banner section start here <================== -->
    <section
      id="home"
      class="banner banner--overlay"
      style="background-image: url(assets/images/banner/bg.jpg)"
    >
      <div class="container">
        <div class="banner__wrapper">
          <div
            class="banner__content text-center"
            data-aos="zoom-in"
            data-aos-duration="900"
          >
            <h1>Weaving Legacies, Connecting Lives</h1>
            <h3>Your Community, Your Story, Our Tapestry</h3>
            <div class="banner__bottom">
              <ul
                class="countdown justify-content-center"
                data-date="July 25, 2023 21:14:01"
                id="countdown"
              >
                <li class="countdown__item">
                  <h3
                    class="countdown__number color--theme-color countdown__number-days"
                  >
                    99
                  </h3>
                  <p class="countdown__text">Days</p>
                </li>
                <li class="countdown__item">
                  <h3
                    class="countdown__number color--theme-color countdown__number-hours"
                  >
                    18
                  </h3>
                  <p class="countdown__text">Hours</p>
                </li>
                <li class="countdown__item">
                  <h3
                    class="countdown__number color--theme-color countdown__number-minutes"
                  >
                    44
                  </h3>
                  <p class="countdown__text">Min</p>
                </li>
                <li class="countdown__item">
                  <h3
                    class="countdown__number color--theme-color countdown__number-seconds"
                  >
                    36
                  </h3>
                  <p class="countdown__text">Sec</p>
                </li>
              </ul>
            </div>
            <a href="#" class="default-btn move-right"
              ><span>Join Now <i class="fa-solid fa-arrow-right"></i></span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- ================> Banner section end here <================== -->

    <!-- ================> Register section start here <================== -->
    <div
      class="register register--uplifted"
      data-aos="fade-up"
      data-aos-duration="900"
    >
      <div class="container">
        <div class="register__wrapper">
          <form action="#" class="register__form">
            <div class="row g-4 align-items-center">
              <div class="col-lg-3 col-sm-6">
                <input
                  type="text"
                  class="form-control"
                  placeholder="First Name"
                />
              </div>
              <div class="col-lg-3 col-sm-6">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Last Name"
                />
              </div>
              <div class="col-lg-3 col-sm-6">
                <input
                  type="email"
                  class="form-control"
                  placeholder="example@gmail.com"
                />
              </div>
              <div class="col-lg-3 col-sm-6">
                <a
                  href="signup.html"
                  class="default-btn default-btn--secondary move-right"
                  ><span>Register <i class="fa-solid fa-arrow-right"></i></span
                ></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- ================> Register section end here <================== -->

    <!-- ================> About section start here <================== -->
    <section class="about padding-top padding-bottom">
      <div class="container">
        <div class="about__wrapper">
          <div class="row g-5">
            <div class="col-lg-6">
              <div
                class="about__thumb"
                data-aos="fade-up"
                data-aos-duration="1500"
              >
                <img src="assets/images/about/1.png" alt="About Image" />
              </div>
            </div>
            <div class="col-lg-6">
              <div
                class="about__content"
                data-aos="fade-up"
                data-aos-duration="2000"
              >
                <p class="subtitle">The Story</p>
                <h2>About Pandey Connect</h2>
                <p>
                  Welcome to PandeyConnect, where the tapestry of our vibrant
                  community is meticulously woven into a digital archive. At
                  PandeyConnect, we are more than just data storage; we are the
                  keepers of the collective narrative, the bridge that connects
                  past, present, and future generations of the Pandey community.
                </p>

                <div class="about__content-feature">
                  <h5>Mission</h5>
                  <p>
                    Our mission is to celebrate the richness of our heritage by
                    preserving the stories, experiences, and accomplishments of
                    our diverse community members. Through cutting-edge
                    technology and a passion for connection, we strive to
                    unravel the intricate threads that bind us together,
                    revealing the unique tapestry of relationships, occupations,
                    and shared endeavors within the Pandey community.
                  </p>

                  <div class="btn-group">
                    <a
                      href="#"
                      class="default-btn default-btn--secondary move-top"
                      ><span>Join Now</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================> About section end here <================== -->

    <!-- ================> feature section start here <================== -->
    <section class="feature padding-top padding-bottom bg--white" id="feature">
      <div class="container">
        <div
          class="section-header text-center"
          data-aos="fade-up"
          data-aos-duration="900"
        >
          <p class="subtitle">Features</p>
          <h2>What We Offer?</h2>
        </div>

        <div class="feature__wrapper">
          <div class="row g-4">
            <div class="col-lg-3 col-sm-6">
              <div
                class="feature__item"
                data-aos="fade-up"
                data-aos-duration="900"
              >
                <div class="feature__item-inner">
                  <div class="feature__item-thumb">
                    <div class="icon">
                      <i class="fa-solid fa-microphone"></i>
                    </div>
                  </div>
                  <div class="feature__item-content text-center">
                    <h4>Holistic Data Storage</h4>
                    <div class="feature__item-text">
                      <p>
                        PandeyConnect provides a secure and comprehensive
                        repository, safeguarding a trove of community data. From
                        family histories to professional milestones, we ensure
                        the preservation of your valuable information.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div
                class="feature__item"
                data-aos="fade-up"
                data-aos-duration="900"
                data-aos-delay="100"
              >
                <div class="feature__item-inner">
                  <div class="feature__item-thumb">
                    <div class="icon">
                      <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                  </div>
                  <div class="feature__item-content text-center">
                    <h4>Interconnected Relationships:</h4>
                    <div class="feature__item-text">
                      <p>
                        Dive into the intricate web of connections within the
                        Pandey community. Our platform offers intuitive tools to
                        map and explore relationships, allowing you to unravel
                        the rich tapestry of familial bonds and community ties.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div
                class="feature__item"
                data-aos="fade-up"
                data-aos-duration="900"
                data-aos-delay="200"
              >
                <div class="feature__item-inner">
                  <div class="feature__item-thumb">
                    <div class="icon">
                      <i class="fa-solid fa-puzzle-piece"></i>
                    </div>
                  </div>
                  <div class="feature__item-content text-center">
                    <h4>Professional Insights:</h4>
                    <div class="feature__item-text">
                      <p>
                        Explore the diverse professional pursuits within the
                        Pandey community. PandeyConnect offers detailed insights
                        into various occupations, illuminating the collective
                        achievements and contributions that define our
                        community.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div
                class="feature__item"
                data-aos="fade-up"
                data-aos-duration="900"
                data-aos-delay="300"
              >
                <div class="feature__item-inner">
                  <div class="feature__item-thumb">
                    <div class="icon">
                      <i class="fa-solid fa-award"></i>
                    </div>
                  </div>
                  <div class="feature__item-content text-center">
                    <h4>Collaborative Networking Hub:</h4>
                    <div class="feature__item-text">
                      <p>
                        Beyond data storage, PandeyConnect is a dynamic platform
                        for community members to connect, collaborate, and build
                        relationships. Join us in fostering meaningful
                        connections that transcend generations and professional
                        domains.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================> feature section end here <================== -->

    <!-- ================> Event access section start here <================== -->
    <section class="event-access padding-top padding-bottom">
      <div class="mockup" data-aos="fade-up-left" data-aos-duration="900"></div>
      <div class="container">
        <div class="contact__wrapper">
          <div class="row">
            <div class="col-lg-6">
              <div
                class="event-access-content"
                data-aos="fade-right"
                data-aos-duration="900"
              >
                <h2>
                  Weaving Digital Legacies, Uniting Stories for a Stronger
                  Future!
                </h2>
                <p>
                  Join us on this journey as we weave a digital legacy,
                  embracing the past while fostering a sense of unity and
                  collaboration for the future. Together, let's celebrate the
                  strength of our community and the countless stories that make
                  us who we are at PandeyConnect."
                </p>
                <a href="#" class="default-btn move-right"
                  ><span>Join Us <i class="fa-solid fa-arrow-right"></i></span
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================> Event access section end here <================== -->

    <!-- ================FAQ section start here <================== -->
    <section id="faq" class="faq padding-top padding-bottom">
      <div class="container">
        <div
          class="section-header text-center"
          data-aos="fade-up"
          data-aos-duration="900"
        >
          <p class="subtitle">Questions & Answers</p>
          <h2>Mostly Asked Questions</h2>
        </div>
        <div class="faq__wrapper">
          <div class="row g-4">
            <div class="col-lg-6">
              <div class="accordion" id="faqAccordion1">
                <div class="row g-4">
                  <div class="col-12">
                    <div
                      class="accordion__item"
                      data-aos="fade-up"
                      data-aos-duration="1000"
                    >
                      <div class="accordion__header" id="faq1">
                        <button
                          class="accordion__button collapsed"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#faqBody1"
                          aria-expanded="false"
                          aria-controls="faqBody1"
                        >
                          What is Uevent <span class="plus-icon"></span>
                        </button>
                      </div>
                      <div
                        id="faqBody1"
                        class="accordion-collapse collapse"
                        aria-labelledby="faq1"
                        data-bs-parent="#faqAccordion1"
                      >
                        <div class="accordion__body">
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Tempore in maiores dignissimos, aut cum unde
                          officiis sed vero fuga enim voluptates nobis ea porro
                          recusandae facere optio exercitationem perferendis id,
                          beatae expedita libero, ullam error eveniet! Provident
                          ipsa enim ab.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div
                      class="accordion__item"
                      data-aos="fade-up"
                      data-aos-duration="1100"
                    >
                      <div class="accordion__header" id="faq2">
                        <button
                          class="accordion__button"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#faqBody2"
                          aria-expanded="true"
                          aria-controls="faqBody2"
                        >
                          When we should choose Uevent?
                          <span class="plus-icon"></span>
                        </button>
                      </div>
                      <div
                        id="faqBody2"
                        class="accordion-collapse collapse show"
                        aria-labelledby="faq2"
                        data-bs-parent="#faqAccordion1"
                      >
                        <div class="accordion__body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit. Velit praesentium quod vero! Autem saepe
                          inventore odit accusamus ad pariatur, sunt corrupti
                          voluptas quam fugiat! Similique consequatur earum
                          tempora error dolores in temporibus quas beatae, quo
                          aperiam saepe vitae ipsa delectus?
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div
                      class="accordion__item"
                      data-aos="fade-up"
                      data-aos-duration="1200"
                    >
                      <div class="accordion__header" id="faq3">
                        <button
                          class="accordion__button collapsed"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#faqBody3"
                          aria-expanded="false"
                          aria-controls="faqBody3"
                        >
                          How good is this event<span class="plus-icon"></span>
                        </button>
                      </div>
                      <div
                        id="faqBody3"
                        class="accordion-collapse collapse"
                        aria-labelledby="faq3"
                        data-bs-parent="#faqAccordion1"
                      >
                        <div class="accordion__body">
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Temporibus in dolores vero, deleniti
                          necessitatibus sed nisi magni vitae fugit nemo nostrum
                          sunt sapiente harum? Sequi eligendi, incidunt laborum
                          optio odio voluptatibus molestiae dignissimos, quo
                          excepturi omnis nulla culpa maxime tempora?
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="accordion" id="faqAccordion2">
                <div class="row g-4">
                  <div class="col-12">
                    <div
                      class="accordion__item"
                      data-aos="fade-up"
                      data-aos-duration="1000"
                    >
                      <div class="accordion__header" id="faq1-two">
                        <button
                          class="accordion__button collapsed"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#faqBody1-two"
                          aria-expanded="false"
                          aria-controls="faqBody1-two"
                        >
                          When is the official launch?
                          <span class="plus-icon"></span>
                        </button>
                      </div>
                      <div
                        id="faqBody1-two"
                        class="accordion-collapse collapse"
                        aria-labelledby="faq1-two"
                        data-bs-parent="#faqAccordion2"
                      >
                        <div class="accordion__body">
                          Lorem ipsum dolor sit, amet consectetur adipisicing
                          elit. Nemo autem ducimus exercitationem iste
                          repellendus recusandae, tempora neque vero, commodi,
                          iure aliquid. Aliquid mollitia ipsa nesciunt adipisci,
                          veniam quis reprehenderit suscipit nulla nobis non
                          similique ab deserunt! Ut quae itaque optio.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div
                      class="accordion__item"
                      data-aos="fade-up"
                      data-aos-duration="1100"
                    >
                      <div class="accordion__header" id="faq2-two">
                        <button
                          class="accordion__button collapsed"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#faqBody2-two"
                          aria-expanded="true"
                          aria-controls="faqBody2-two"
                        >
                          What will the ticket price be?
                          <span class="plus-icon"></span>
                        </button>
                      </div>
                      <div
                        id="faqBody2-two"
                        class="accordion-collapse collapse"
                        aria-labelledby="faq2-two"
                        data-bs-parent="#faqAccordion2"
                      >
                        <div class="accordion__body">
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Neque quisquam eaque animi quia sunt. Porro aut
                          perferendis nostrum accusamus. Aliquam omnis, et
                          magnam saepe molestiae vitae maxime commodi repellat
                          ipsam vero, delectus nulla ab. Ut quidem delectus
                          tenetur nostrum veritatis!
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div
                      class="accordion__item"
                      data-aos="fade-up"
                      data-aos-duration="1200"
                    >
                      <div class="accordion__header" id="faq3-two">
                        <button
                          class="accordion__button"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#faqBody3-two"
                          aria-expanded="false"
                          aria-controls="faqBody3-two"
                        >
                          How does the raffle work?<span
                            class="plus-icon"
                          ></span>
                        </button>
                      </div>
                      <div
                        id="faqBody3-two"
                        class="accordion-collapse collapse show"
                        aria-labelledby="faq3-two"
                        data-bs-parent="#faqAccordion2"
                      >
                        <div class="accordion__body">
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Non aut reprehenderit repudiandae cupiditate
                          iste, impedit excepturi eaque quod dolorum corrupti,
                          consequuntur totam deserunt unde. Sint, inventore
                          quaerat officia ipsa quo aliquid? Necessitatibus
                          consequuntur perferendis illum, repellat
                          exercitationem laboriosam quae voluptates?
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================FAQ section end here <================== -->

    <!-- ================Blog section start here <================== -->
    <section class="blog padding-top padding-bottom bg--white">
      <div class="container">
        <div
          class="section-header text-center"
          data-aos="fade-up"
          data-aos-duration="900"
        >
          <p class="subtitle">Latest Articles</p>
          <h2>Our Recent Blog Post</h2>
        </div>
        <div class="blog__wrapper">
          <div class="row g-4">
            <div class="col-lg-4 col-md-6">
              <div
                class="blog__item"
                data-aos="fade-up"
                data-aos-duration="900"
              >
                <div class="blog__inner">
                  <div class="blog__thumb">
                    <img src="assets/images/blog/01.jpg" alt="Blog Images" />
                  </div>
                  <div class="blog__content">
                    <div class="blog__content-top">
                      <span class="blog__meta-tag">Event</span>
                      <h4>
                        <a href="blog-single.html"
                          >Distinct Resource Maximizing Conference</a
                        >
                      </h4>
                      <ul
                        class="blog__meta d-flex flex-wrap align-items-center"
                      >
                        <li class="blog__meta-author">
                          <a href="#"
                            ><span><i class="fa-solid fa-user"></i></span> Jhon
                            Doe</a
                          >
                        </li>
                        <li class="blog__meta-date">
                          <a href="#"
                            ><span
                              ><i class="fa-solid fa-calendar-days"></i
                            ></span>
                            30 December 2023</a
                          >
                        </li>
                      </ul>
                    </div>
                    <p>
                      Contrar to popuar belieif loreme Ipsum is an not
                      consectetur cites of the word in...
                    </p>
                    <div class="blog__content-bottom">
                      <a href="blog-single.html" class="text-btn">Read More</a>
                      <a href="#" class="blog__meta-comment">
                        <i class="fa-solid fa-message"></i>
                        <span
                          class="position-absolute top-0 start-100 translate-middle rounded-circle"
                        >
                          2
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div
                class="blog__item"
                data-aos="fade-up"
                data-aos-duration="900"
                data-aos-delay="100"
              >
                <div class="blog__inner">
                  <div class="blog__thumb">
                    <img src="assets/images/blog/02.jpg" alt="Blog Images" />
                  </div>
                  <div class="blog__content">
                    <div class="blog__content-top">
                      <span class="blog__meta-tag">Conference</span>
                      <h4>
                        <a href="blog-single.html"
                          >Make 100% profit by Conference Event</a
                        >
                      </h4>
                      <ul
                        class="blog__meta d-flex flex-wrap align-items-center"
                      >
                        <li class="blog__meta-author">
                          <a href="#"
                            ><span><i class="fa-solid fa-user"></i></span>
                            rasselmrh
                          </a>
                        </li>
                        <li class="blog__meta-date">
                          <a href="#"
                            ><span
                              ><i class="fa-solid fa-calendar-days"></i
                            ></span>
                            30 December 2023</a
                          >
                        </li>
                      </ul>
                    </div>
                    <p>
                      Contrar to popuar belieif loreme Ipsum is an not
                      consectetur cites of the word in...
                    </p>
                    <div class="blog__content-bottom">
                      <a href="blog-single.html" class="text-btn">Read More</a>
                      <a href="#" class="blog__meta-comment">
                        <i class="fa-solid fa-message"></i>
                        <span
                          class="position-absolute top-0 start-100 translate-middle rounded-circle"
                        >
                          2
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div
                class="blog__item"
                data-aos="fade-up"
                data-aos-duration="900"
                data-aos-delay="200"
              >
                <div class="blog__inner">
                  <div class="blog__thumb">
                    <img src="assets/images/blog/03.jpg" alt="Blog Images" />
                  </div>
                  <div class="blog__content">
                    <div class="blog__content-top">
                      <span class="blog__meta-tag">meetup</span>
                      <h4>
                        <a href="blog-single.html"
                          >Purchase your 1st Event meetup here</a
                        >
                      </h4>
                      <ul
                        class="blog__meta d-flex flex-wrap align-items-center"
                      >
                        <li class="blog__meta-author">
                          <a href="#"
                            ><span><i class="fa-solid fa-user"></i></span> Samon
                            Bell</a
                          >
                        </li>
                        <li class="blog__meta-date">
                          <a href="#"
                            ><span
                              ><i class="fa-solid fa-calendar-days"></i
                            ></span>
                            30 December 2023</a
                          >
                        </li>
                      </ul>
                    </div>
                    <p>
                      Contrar to popuar belieif loreme Ipsum is an not
                      consectetur cites of the word in...
                    </p>
                    <div class="blog__content-bottom">
                      <a href="blog-single.html" class="text-btn">Read More</a>
                      <a href="#" class="blog__meta-comment">
                        <i class="fa-solid fa-message"></i>
                        <span
                          class="position-absolute top-0 start-100 translate-middle rounded-circle"
                        >
                          2
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-5 text-center">
            <a href="blog.html" class="default-btn move-right"
              ><span>View more</span></a
            >
          </div>
        </div>
      </div>
    </section>
    <!-- ================Blog section end here <================== -->
                 
@endsection