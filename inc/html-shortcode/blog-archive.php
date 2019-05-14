<section class="page-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-page-content" data-jplist-group="data-blog">
                    <!-- Start Single Post -->
                    <?php $blog = new WP_Query($args);
                        while($blog->have_posts()) : $blog->the_post();?>
                    <article class="post post-large" data-jplist-item>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="img"></a>
                        </div>
                        <div class="entry-meta">
                            <div class="tag meta-date">
                                <i class="tag-icon fa fa-calendar-o"></i>
                                <?php the_time('F j, Y')?>
                            </div>
                            <div class="tag meta-author">
                                <i class="tag-icon fa fa-user"></i>
                                <?php the_author(); ?>
                            </div>
                            <div class="tag meta-author">
                                <i class="tag-icon fa fa-tags"></i>
                                <?php echo get_the_category()[0]->name; ?>
                            </div>
                        </div>
                        <div class="entry-content">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p><?php the_excerpt(); ?></p>
                            <a class="link-more btn btn-default btn-red" href="<?php the_permalink(); ?>">Baca</a>
                        </div>
                    </article><!-- End Single Post -->
                <?php endwhile; ?>
                </div>
                <div class="filter-no-result" data-jplist-control="no-results" data-group="data-blog" data-name="no-results"><h4>No Results Found</h4></div>
                <div
                    data-jplist-control="pagination"
                    data-group="data-blog"
                    data-items-per-page="5"
                    data-current-page="0"
                    data-name="pagination1">

                    <div class="row mb-3 pagination-ukm">
                        <div class="jplist-holder" data-type="pages">
                            <button type="button" data-type="page">{pageNumber}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="sidebar-estate right">
                    <div class="sidebar-widget search wow fadeIn" data-wow-duration="1000ms" data-wow-delay="">
                        <h4 class="widget-title">Cari Artikel</h4>
                        <div class="search-form">
                            <input type="text" class="form-control" placeholder="Cari berdasarkan judul">
                        </div>
                    </div>

                   <!--  <div class="sidebar-widget categories wow fadeIn" data-wow-duration="1000ms" data-wow-delay="">
                        <h4 class="widget-title">Categories</h4>
                        <div class="category-item">
                            <a href="javascript:" class="link-item">Hotel & Tour <span class="number">(214)</span></a>
                            <div class="sublinks">
                                <a href="#" class="link-item sublink">-  Properties (20)</a>
                                <a href="#" class="link-item sublink">-  Rented (45)</a>
                                <a href="#" class="link-item sublink">-  Brokers (10)</a>
                            </div>
                        </div>
                        <div class="category-item expanded">
                            <a href="javascript:" class="link-item">Real Estates <span class="number">(95)</span></a>
                            <div class="sublinks">
                                <a href="#" class="link-item sublink">-  Properties (20)</a>
                                <a href="#" class="link-item sublink">-  Rented (45)</a>
                                <a href="#" class="link-item sublink">-  Brokers (10)</a>
                            </div>
                        </div>
                        <div class="category-item">
                            <a href="javascript:" class="link-item">Restaurant <span class="number">(145)</span></a>
                            <div class="sublinks">
                                <a href="#" class="link-item sublink">-  Properties (20)</a>
                                <a href="#" class="link-item sublink">-  Rented (45)</a>
                                <a href="#" class="link-item sublink">-  Brokers (10)</a>
                            </div>
                        </div>
                        <div class="category-item">
                            <a href="javascript:" class="link-item">Tool / Tips <span class="number">(21)</span></a>
                            <div class="sublinks">
                                <a href="#" class="link-item sublink">-  Properties (20)</a>
                                <a href="#" class="link-item sublink">-  Rented (45)</a>
                                <a href="#" class="link-item sublink">-  Brokers (10)</a>
                          </div>
                        </div>
                        <div class="category-item">
                            <a href="javascript:" class="link-item">Others <span class="number">(541)</span></a>
                            <div class="sublinks">
                                <a href="#" class="link-item sublink">-  Properties (20)</a>
                                <a href="#" class="link-item sublink">-  Rented (45)</a>
                                <a href="#" class="link-item sublink">-  Brokers (10)</a>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget wow fadeIn" data-wow-duration="1000ms" data-wow-delay="">
                        <h4 class="widget-title">Latest Post</h4>
                        <div class="nav filter_tabs">
                            <a href="#latest" class="tab active" data-toggle="tab">Latest</a>
                            <a href="#popular" class="tab" data-toggle="tab">Popular</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="latest">
                                <div class="post-item">
                                  <img src="images/others/01.png" alt="" class="post-image">
                                  <div class="post-info">
                                    <a href="#" class="post-title">Image Blog Post Formate</a>
                                    <div class="date">Dec 11, 2017</div>
                                  </div>
                                </div>
                                <div class="post-item">
                                  <img src="images/others/02.png" alt="" class="post-image">
                                  <div class="post-info">
                                    <a href="#" class="post-title">Image Blog Post Formate</a>
                                    <div class="date">Dec 11, 2017</div>
                                  </div>
                                </div>
                                <div class="post-item">
                                  <img src="images/others/03.png" alt="" class="post-image">
                                  <div class="post-info">
                                    <a href="#" class="post-title">Image Blog Post Formate</a>
                                    <div class="date">Dec 11, 2017</div>
                                  </div>
                                </div>
                                <div class="post-item">
                                  <img src="images/others/04.png" alt="" class="post-image">
                                  <div class="post-info">
                                    <a href="#" class="post-title">Image Blog Post Formate</a>
                                    <div class="date">Dec 11, 2017</div>
                                  </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="popular">
                                <div class="post-item">
                                  <img src="images/others/03.png" alt="" class="post-image">
                                  <div class="post-info">
                                    <a href="#" class="post-title">Image Blog Post Formate</a>
                                    <div class="date">Dec 11, 2017</div>
                                  </div>
                                </div>
                                <div class="post-item">
                                  <img src="images/others/04.png" alt="" class="post-image">
                                  <div class="post-info">
                                    <a href="#" class="post-title">Image Blog Post Formate</a>
                                    <div class="date">Dec 11, 2017</div>
                                  </div>
                                </div>
                                <div class="post-item">
                                  <img src="images/others/01.png" alt="" class="post-image">
                                  <div class="post-info">
                                    <a href="#" class="post-title">Image Blog Post Formate</a>
                                    <div class="date">Dec 11, 2017</div>
                                  </div>
                                </div>
                                <div class="post-item">
                                  <img src="images/others/02.png" alt="" class="post-image">
                                  <div class="post-info">
                                    <a href="#" class="post-title">Image Blog Post Formate</a>
                                    <div class="date">Dec 11, 2017</div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget archives wow fadeIn" data-wow-duration="1000ms" data-wow-delay="">
                        <h4 class="widget-title">Archives</h4>          
                        <a href="#" class="link-item">January 2017</a>
                        <a href="#" class="link-item">February 2017</a>
                        <a href="#" class="link-item">March 2017</a>
                        <a href="#" class="link-item">April 2017</a>
                    </div>
                    <div class="sidebar-widget wow fadeIn" data-wow-duration="1000ms" data-wow-delay="">
                        <h4 class="widget-title">Instagram</h4>
                        <div class="instagrams">
                      <a href="#" class="instagram">
                        <img src="images/others/05.png" alt="">
                        <div class="red-screen">
                          <i class="fa fa-search"></i>
                        </div>
                      </a>
                      <a href="#" class="instagram">
                        <img src="images/others/06.png" alt="">
                        <div class="red-screen">
                          <i class="fa fa-search"></i>
                        </div>
                      </a>
                      <a href="#" class="instagram">
                        <img src="images/others/07.png" alt="">
                        <div class="red-screen">
                          <i class="fa fa-search"></i>
                        </div>
                      </a>
                      <a href="#" class="instagram">
                        <img src="images/others/08.png" alt="">
                        <div class="red-screen">
                          <i class="fa fa-search"></i>
                        </div>
                      </a>
                      <a href="#" class="instagram">
                        <img src="images/others/09.png" alt="">
                        <div class="red-screen">
                          <i class="fa fa-search"></i>
                        </div>
                      </a>
                      <a href="#" class="instagram">
                        <img src="images/others/10.png" alt="">
                        <div class="red-screen">
                          <i class="fa fa-search"></i>
                        </div>
                      </a>
                        </div>
                    </div>
                    <a href="#" class="sidebar-widget advertise wow fadeIn" data-wow-duration="1000ms" data-wow-delay="">
                        <img src="images/hotel-tour/40.png" alt="">
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jplist.init();
</script>