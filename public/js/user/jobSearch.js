$(function () {
    /* Filter section */

    // Show filter body on click filter header
    $('.filter-header').on('click', function () {
        $(this).children('i').toggleClass('rotate-180').parent().next().slideToggle(300);
    })

    //  Show filter in small screen
    $('.show-filter-in-small-screen').on('click', function () {
        $('.display-sm-none').slideToggle(300);
    });

    // Show more
    $('.filtration-show-more').on('click', function () {
        const that = $(this);
        that.parent().children('div:not(:first-of-type)').toggleClass('display-none');
        if (that.hasClass('show-more-action')) {
            that.removeClass('show-more-action');
            that.text('Show less');
        } else {
            that.addClass('show-more-action');
            that.text('Show more');
        }
    });

    const numberOfcheckedFiltersHTML = $('#filters-selected');
    var numberOfCheckedFilters = 0, minExperienceChange = false, maxExperienceChange = false;
    var filtration = {
        country: new Set().add('all'), // all or countryId
        city: new Set().add('all'), // all or cityId
        careerLevel: new Set().add('all'), // all or careerLevelId
        jobCategory: new Set().add('all'), // all or jobCategoryId
        jobType: new Set().add('all'), // all or jobTypeId
        yearsOfExperience: {},
        datePosted: 'all' // all -> all, 'day' -> past 24, 'week' -> past week, 'month' -> past month
    };

    // Change filters checkbox (country, city, career level, job category, job type)
    $('.filter-checkbox-input').on('change', function () {
        const that = $(this),
            allSiblingDivs = that.parent().siblings(':not(:first-of-type)'), // siblings without all filter
            allSiblingsCheckbox = allSiblingDivs.children('.filter-checkbox-input'), // checkboxes for sibling without all filter
            thatAllSiblingDiv = that.parent().siblings('div:first-of-type'), // all filter sibling div
            thatAllSiblingCheckbox = thatAllSiblingDiv.children('.filter-checkbox-input'), // checkbox for all filter sibling
            allSiblingsLabelsChecked = that.parent().parent().find('.filter-checkbox-input:checked'); // all checkboxes checked

        if (that.hasClass('all-check')) { // current is all filter
            $(allSiblingsCheckbox).prop('checked', false) // remove checked from other filtration

            if (that.is(':checked')) { // all filter is checked
                // Country
                if (that.attr('name') === `country-${that.val()}`) {
                    filtration.country.clear(); // remove all previous filters
                    filtration.country.add(that.val()); // add all country to filtration
                }
                // City
                if (that.attr('name') === `city-${that.val()}`) {
                    filtration.city.clear(); // remove all previous filters
                    filtration.city.add(that.val()); // add all country to filtration
                }
                // Career level
                if (that.attr('name') === `career-level-${that.val()}`) {
                    filtration.careerLevel.clear(); // remove all previous filters
                    filtration.careerLevel.add(that.val()); // add all country to filtration
                }
                // Job category
                if (that.attr('name') === `job-category-${that.val()}`) {
                    filtration.jobCategory.clear(); // remove all previous filters
                    filtration.jobCategory.add(that.val()); // add all country to filtration
                }
                // Job type
                if (that.attr('name') === `job-type-${that.val()}`) {
                    filtration.jobType.clear(); // remove all previous filters
                    filtration.jobType.add(that.val()); // add all country to filtration
                }
            } else { // all is not checked
                that.prop('checked', true); // rechecked all filter again as the filter must be specified
            }

        } else { // current is not all filter
            if (that.is(':checked')) { // current is checked
                thatAllSiblingCheckbox.prop('checked', false); // remove check from all filter
                // country
                if (that.attr('name') === `country-${that.val()}`) {
                    filtration.country.delete('all'); // remove all previous filters
                    filtration.country.add(that.val()); // add all country to filtration
                }
                // city
                if (that.attr('name') === `city-${that.val()}`) {
                    filtration.city.delete('all'); // remove all previous filters
                    filtration.city.add(that.val()); // add all country to filtration
                }
                // Career level
                if (that.attr('name') === `career-level-${that.val()}`) {
                    filtration.careerLevel.delete('all'); // remove all previous filters
                    filtration.careerLevel.add(that.val()); // add all country to filtration
                }
                // Job category
                if (that.attr('name') === `job-category-${that.val()}`) {
                    filtration.jobCategory.delete('all'); // remove all previous filters
                    filtration.jobCategory.add(that.val()); // add all country to filtration
                }
                // Job type
                if (that.attr('name') === `job-type-${that.val()}`) {
                    filtration.jobType.delete('all'); // remove all previous filters
                    filtration.jobType.add(that.val()); // add all country to filtration
                }
            } else { // current is not checked
                // country
                if (that.attr('name') === `country-${that.val()}`) {
                    filtration.country.delete(that.val()); // remove country from filtration
                    if (allSiblingsLabelsChecked.length == 0) {
                        thatAllSiblingCheckbox.prop('checked', true); // recheck all filter again as the filter must be specified
                        filtration.country.add('all'); // add all filter
                    }
                }
                // City
                if (that.attr('name') === `city-${that.val()}`) {
                    filtration.city.delete(that.val()); // remove city from filtration
                    if (allSiblingsLabelsChecked.length == 0) {
                        thatAllSiblingCheckbox.prop('checked', true); // recheck all filter again as the filter must be specified
                        filtration.city.add('all'); // add all filter
                    }
                }
                // Career level
                if (that.attr('name') === `career-level-${that.val()}`) {
                    filtration.careerLevel.delete(that.val()); // remove career level previous filters
                    if (allSiblingsLabelsChecked.length == 0) {
                        thatAllSiblingCheckbox.prop('checked', true); // recheck all filter again as the filter must be specified
                        filtration.careerLevel.add('all'); // add all filter
                    }
                }
                // Job category
                if (that.attr('name') === `job-category-${that.val()}`) {
                    filtration.jobCategory.delete(that.val()); // remove job category previous filters
                    if (allSiblingsLabelsChecked.length == 0) {
                        thatAllSiblingCheckbox.prop('checked', true); // recheck all filter again as the filter must be specified
                        filtration.jobCategory.add('all'); // add all filter
                    }
                }
                // Job type
                if (that.attr('name') === `job-type-${that.val()}`) {
                    filtration.jobType.delete(that.val()); // remove job type previous filters
                    if (allSiblingsLabelsChecked.length == 0) {
                        thatAllSiblingCheckbox.prop('checked', true); // recheck all filter again as the filter must be specified
                        filtration.jobType.add('all'); // add all filter
                    }
                }
            }
        }
        updateNumberOfCheckedFilters();
    });

    // change filter years of experience
    $('#min-years-of-experience-filter').on('change', function () {
        // validate as min greater than or equal max
        if (parseInt($('#min-years-of-experience-filter').val()) > parseInt($('#max-years-of-experience-filter').val())) {
            $(this).parent().parent().next().removeClass('d-none');
            delete filtration.yearsOfExperience.min; // remove experience filter
            numberOfCheckedFilters--;
        } else {
            $(this).parent().parent().next().addClass('d-none');
            if (!minExperienceChange) {
                minExperienceChange = true;
                numberOfCheckedFilters++;
            }
            filtration.yearsOfExperience.min = $('#min-years-of-experience-filter').val();
        }
        numberOfcheckedFiltersHTML.text(numberOfCheckedFilters);
    });
    $('#max-years-of-experience-filter').on('change', function () {
        // validate as min greater than or equal max
        if (parseInt($('#min-years-of-experience-filter').val()) > parseInt($('#max-years-of-experience-filter').val())) {
            $(this).parent().parent().next().removeClass('d-none');
            delete filtration.yearsOfExperience.max; // remove experience filter
            numberOfCheckedFilters--;
        } else {
            if (!maxExperienceChange) {
                maxExperienceChange = true;
                numberOfCheckedFilters++;
            }
            filtration.yearsOfExperience.max = $('#max-years-of-experience-filter').val();
        }
        numberOfcheckedFiltersHTML.text(numberOfCheckedFilters);
    });

    // Change filters radio (date posted)
    $('.filter-radio-input').on('click', function () {
        const that = $(this);
        filtration.datePosted = that.val(); // all date posted filter
        updateNumberOfCheckedFilters();
    });
    // search in filtration options with keyword (Live filtration)
    $('.filter-search-input').keyup(function (e) {
        const allSiblingLabels = $(this).siblings().children('label:not(.all-label)'); // <input> <div><input><label></label></div>
        let searchKeyword = $(this).val();
        searchKeyword = '.*' + searchKeyword + '.*'; // initialize keyword to be regular expression
        const regexString = new RegExp(searchKeyword, 'i');
        allSiblingLabels.each(function (index, element) {
            const label = $(element),
                labelText = label.text();
            if (labelText.match(regexString)) {
                $(label).parent().removeClass('display-none');
            } else {
                $(label).parent().addClass('display-none');
            }
        });
    });

    function updateNumberOfCheckedFilters() {
        numberOfCheckedFilters = filtration.country.size + filtration.city.size + filtration.careerLevel.size +
            filtration.jobCategory.size + filtration.jobType.size + 1;
        if (filtration.yearsOfExperience.hasOwnProperty('min'))
            numberOfCheckedFilters++;
        if (filtration.yearsOfExperience.hasOwnProperty('max'))
            numberOfCheckedFilters++;

        if (filtration.country.has('all'))
            numberOfCheckedFilters--;
        if (filtration.city.has('all'))
            numberOfCheckedFilters--;
        if (filtration.careerLevel.has('all'))
            numberOfCheckedFilters--;
        if (filtration.jobCategory.has('all'))
            numberOfCheckedFilters--;
        if (filtration.jobType.has('all'))
            numberOfCheckedFilters--;
        if (filtration.datePosted == 'all')
            numberOfCheckedFilters--;

        numberOfcheckedFiltersHTML.text(numberOfCheckedFilters);
    }

    // get filtration data as json
    function getAllFilters() {
        return JSON.stringify(
            {
                "countries": Array.from(filtration.country).join(','),
                "cities": Array.from(filtration.city).join(','),
                "careerLevel": Array.from(filtration.careerLevel).join(', '),
                "jobCategory": Array.from(filtration.jobCategory).join(', '),
                "yearsOfExperience": JSON.stringify(filtration.yearsOfExperience),
                "jobType": Array.from(filtration.jobType).join(', '),
                "datePosted": filtration.datePosted,
            }
        );
    }

    /* //////////////////////////////////////////  */
    /* Search and job section*/
    const jobSearchButton = $('#job-search-button'),
        jobSearchKeyword = $('#job-search-keyword'),
        jobSearchFilters = $('#job-search-filters');

    // send the from or not (check if the input of search empty)
    jobSearchButton.on('click', function (e) {
        if (jobSearchKeyword.val() === '') {
            e.preventDefault();
            jobSearchButton.next().removeClass('d-none');
        } else {
            jobSearchFilters.val(getAllFilters());
        }
    })

    (function initializeFiltrationObjectWithOldData() {
        // Show loading when initialization start
        $("#loading_untill_request_done").fadeIn(300);
        const countriesFilterContainer = $('#countries-filter-container').find('input[value!="all"]:checked'),
            citiesFilterContainer = $('#cities-filter-container').find('input[value!="all"]:checked'),
            careerLevelFilterContainer = $('#career-level-filter-container').find('input[value!="all"]:checked'),
            jobCategoriesFilterContainer = $('#job-categories-filter-container').find('input[value!="all"]:checked'),
            jobTypesFilterContainer = $('#job-types-filter-container').find('input[value!="all"]:checked'),
            yearsOfExperienceFilterContainer = $('#years-of-experience-filter-container select'),
            datePostedFilterContainer = $('#date-posted-filter-container').find('input[value!="all"]:checked');

        // initialize countries filtration object with old filtration data
        if (countriesFilterContainer.length) {
            filtration.country.clear(); // remove all filters default
            countriesFilterContainer.each(function (index, obj) {
                filtration.country.add($(obj).val()); // add all country to filtration
            })
        }

        // initialize cities filtration object with old filtration data
        if (citiesFilterContainer.length) {
            filtration.city.clear(); // remove all filters default
            citiesFilterContainer.each(function (index, obj) {
                filtration.city.add($(obj).val()); // add all country to filtration
            })
        }

        // initialize career level filtration object with old filtration data
        if (careerLevelFilterContainer.length) {
            filtration.careerLevel.clear(); // remove all filters default
            careerLevelFilterContainer.each(function (index, obj) {
                filtration.careerLevel.add($(obj).val()); // add all country to filtration
            })
        }

        // initialize job category filtration object with old filtration data
        if (jobCategoriesFilterContainer.length) {
            filtration.jobCategory.clear(); // remove all filters default
            jobCategoriesFilterContainer.each(function (index, obj) {
                filtration.jobCategory.add($(obj).val()); // add all country to filtration
            })
        }

        // initialize job category filtration object with old filtration data
        if (jobTypesFilterContainer.length) {
            filtration.jobType.clear(); // remove all filters default
            jobTypesFilterContainer.each(function (index, obj) {
                filtration.jobType.add($(obj).val()); // add all country to filtration
            })
        }

        // initialize job category filtration object with old filtration data
        if (yearsOfExperienceFilterContainer.length) {
            if (yearsOfExperienceFilterContainer.eq(0).val())
                filtration.yearsOfExperience.min = yearsOfExperienceFilterContainer.eq(0).val();

            if (yearsOfExperienceFilterContainer.eq(1).val())
                filtration.yearsOfExperience.max = yearsOfExperienceFilterContainer.eq(1).val();
        }

        // initialize date posted filtration object with old filtration data
        if (datePostedFilterContainer.length) {
            filtration.datePosted = datePostedFilterContainer.val();
        }

        updateNumberOfCheckedFilters();
        // Show loading when request sent
        $("#loading_untill_request_done").fadeOut(100);
    }());
})
