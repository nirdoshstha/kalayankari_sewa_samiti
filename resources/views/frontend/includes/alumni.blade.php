<div class="user__section">
                <div class="container">
                    <div class="college__message d-flex justify-content-center">
                        <div class="moto__top wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <p>“{{setting()?->general_info ?? 'We are what we repeatedly do. Excellence, then, is not an act, but a habit”- Aristotle.
                                Established'}}”</p>
                        </div>
                    </div>
                    <div class="members__section wow fadeInUp" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <div class="flex__wrapper d-flex justify-content-center">
                            <div class="number__wrapper numbers">
                                <div class="top__header-holder border__right">
                                    <h4>Years</h4>
                                </div>
                                <div class="bottom__number-holder">
                                    <h1><span>{{setting()?->years ?? '25'}}</span>+</h1>
                                </div>
                            </div>
                            <div class="number__wrapper numbers">
                                <div class="top__header-holder border__right">
                                    <h4>Happy Parents</h4>
                                </div>
                                <div class="bottom__number-holder">
                                    <h1><span>{{setting()?->happy_parents ?? '1000'}}</span>+</h1>
                                </div>
                            </div>
                            <div class="number__wrapper numbers">
                                <div class="top__header-holder">
                                    <h4>Alumni</h4>
                                </div>
                                <div class="bottom__number-holder">
                                    <h1><span>{{setting()?->alumni ?? '5000'}}</span>+</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>