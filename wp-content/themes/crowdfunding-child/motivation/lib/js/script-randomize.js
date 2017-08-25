// Ajax on Randomize & Reset buttons
jQuery(document).ready(function ($) {
    function validateSettingsInputs() {
        var validationOk = true;
        var i;
        var totalPercent = 0;
        //validation
        if ($("#motivation_minutes_from").val() == '') {
            validationOk = false;
            alert('"Minutes From" is Empty! Please fill it.');
        }
        if ($("#motivation_minutes_to").val() == '') {
            validationOk = false;
            alert('"Minutes To" is Empty"! Please fill it.');
        }
        if ($("#motivation_backers_from").val() == '') {
            validationOk = false;
            alert('"Backers From" is Empty"! Please fill it.');
        }
        if ($("#motivation_backers_to").val() == '') {
            validationOk = false;
            alert('"Backers To" is Empty"! Please fill it.');
        }

        i = 1;
        //Reward block
        while (i <= parseInt($("#motivation_rewards_counter").val())) {
            if ($("#motivation_reward_percent_" + i).val() == '') {
                validationOk = false;
                alert('"Reward Percent #' + String(i) + ' Please set up this input!');
            } else {
                //alert('Percent for summarizing '+i+' = ' + parseFloat($("#motivation_reward_percent_" + i).val()));
                totalPercent = totalPercent + parseFloat($("#motivation_reward_percent_" + i).val());
            }

            if ($("#motivation_reward_amount_" + i).val() == '') {
                validationOk = false;
                alert('"Reward Amount #' + String(i) + ' Please setup Reward tab first!');
            }

            i++;
        }

        //Summarized Percent must be equal to 100%
        if (totalPercent != 100) {
            validationOk = false;
            alert('Summarized Percent must be equal to 100%, right now it is equal to ' + totalPercent + '%, Please check all Reward Percent and correct it!');
        }
        return validationOk;
    }

    function updateMotivationValue(responseObj) {
        //Changing frontend values
        $("#motivation_pledged").val(responseObj.motivation_pledged);
        $("#motivation_backers").val(responseObj.motivation_backers);
        //backers & pledges for Rewards
        i = 1;
        while (i <= parseInt(responseObj.motivation_rewards_counter)) {
            $("#motivation_reward_backers_" + i).val(responseObj['motivation_reward_backers_' + i]);
            $("#motivation_reward_pledges_" + i).val(responseObj['motivation_reward_pledges_' + i]);
            i++;
        }

        //Change Percent progress bar
        document.getElementById('motivation_pledged_percent_span').innerHTML = responseObj.motivation_pledged_percent + '% Complete';
        document.getElementById('motivation_pledged_percent').setAttribute('aria-valuenow', responseObj.motivation_pledged_percent);
        document.getElementById('motivation_pledged_percent').style.width = responseObj.motivation_pledged_percent + '%';

        //Change fire date
        $("#motivation_last_randomize_date_time").attr('value', responseObj.motivation_last_randomize_date_time)
    }

    $("#btn-motivation-randomize").on("click", function () {

        var data = {
            action: 'motivation_randomize_button_click',
            motivation_funding_goal: $("#motivation_funding_goal").val(),
            motivation_pledged: $("#motivation_pledged").val(),
            motivation_backers: $("#motivation_backers").val(),

            motivation_minutes_from: $("#motivation_minutes_from").val(),
            motivation_minutes_to: $("#motivation_minutes_to").val(),

            motivation_backers_from: $("#motivation_backers_from").val(),
            motivation_backers_to: $("#motivation_backers_to").val(),
            motivation_rewards_counter: $("#motivation_rewards_counter").val(),
            motivation_last_randomize_date_time: $("#motivation_last_randomize_date_time").val()

        };

        i = 1;

        while (i <= parseInt($("#motivation_rewards_counter").val())) {
            data['motivation_reward_percent_' + i] = $("#motivation_reward_percent_" + i).val() == '' ? 0 : $("#motivation_reward_percent_" + i).val();
            data['motivation_reward_amount_' + i] = $("#motivation_reward_amount_" + i).val() == '' ? 0 : $("#motivation_reward_amount_" + i).val();
            data['motivation_reward_backers_' + i] = $("#motivation_reward_backers_" + i).val() == '' ? 0 : $("#motivation_reward_backers_" + i).val();
            data['motivation_reward_pledges_' + i] = $("#motivation_reward_pledges_" + i).val() == '' ? 0 : $("#motivation_reward_pledges_" + i).val();
            i++;
        }
        if (parseFloat(data.motivation_pledged) >= parseFloat(data.motivation_funding_goal)) {
            alert('No need to do randomization! The goal reached!');
        } else {
            //alert(JSON.stringify(data));
            if (validateSettingsInputs()) {
                jQuery.post(ajaxurl, data, function (response) {
                    //parse response
                    //alert(response);
                    updateMotivationValue(JSON.parse(response));
                });
            }
        }

    });

    $("#btn-motivation-reset").on("click", function () {
        var responseObj = {
            motivation_pledged: document.getElementById('motivation_real_fund_raised').innerHTML == 0 ? 0 : document.getElementById('motivation_real_fund_raised').innerHTML,
            motivation_backers: document.getElementById('motivation_real_backers').innerHTML == 0 ? 0 : document.getElementById('motivation_real_backers').innerHTML,
            motivation_pledged_percent: document.getElementById('motivation_real_pledged_percent').innerHTML,
            motivation_rewards_counter: $("#motivation_rewards_counter").val(),
            motivation_last_randomize_date_time: 0
        };

        i = 1;

        while (i <= parseInt($("#motivation_rewards_counter").val())) {
            responseObj['motivation_reward_backers_' + i] = 0;
            responseObj['motivation_reward_pledges_' + i] = 0;
            i++;
        }

        updateMotivationValue(responseObj);
    });
});


//Changing values of percent progress bar on fly
//Show the Celery URL
jQuery(document).ready(function ($) {
    $('#motivation_pledged').bind('input', function () {
        var newPercent = parseFloat($("#motivation_pledged_percent").val());
        var motivation_pledged = parseFloat($("#motivation_pledged").val());
        var motivation_funding_goal = parseFloat($("#motivation_funding_goal").val());

        //Calculate new percent
        newPercent = motivation_pledged > motivation_funding_goal ? 100 : round((motivation_pledged * 100) / motivation_funding_goal, 2);

        //Put new percent inside appropriate frontend blocks
        document.getElementById('motivation_pledged_percent_span').innerHTML = newPercent + '%';
        document.getElementById('motivation_pledged_percent').setAttribute('aria-valuenow', newPercent);
        document.getElementById('motivation_pledged_percent').style.width = newPercent + '%';
    });
});


//Change Reward Tab Values
//wpneo_rewards_pladge_amount[]

jQuery(document).ready(function ($) {
    function SaveRewardsNumber(newNumber) {
        $("#motivation_rewards_counter").attr('value', newNumber)
    }

    function changeAttrMotivanionReward(oldIndex, newIndex) {
        //group class
        $("#motivation_reward_settings .motivation_reward_group_" + oldIndex).attr('class', 'motivation_reward_group_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " h2.motivation_reward_header").html('Reward #' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " h2.motivation_reward_header").attr('motivation_reward_index', newIndex);

        //url Celery
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " h5#label_motivation_celery_url_product_reward_" + oldIndex).attr('id', "label_motivation_celery_url_product_reward_" + newIndex);

        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_celery_url_product_reward_" + oldIndex + "_field").attr('class', 'form-field motivation_celery_url_product_reward_' + newIndex + '_field');
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_celery_url_product_reward_" + newIndex + "_field label").attr('for', 'motivation_celery_url_product_reward_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_celery_url_product_reward_" + newIndex + "_field input").attr('name', 'motivation_celery_url_product_reward_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_celery_url_product_reward_" + newIndex + "_field input").attr('id', 'motivation_celery_url_product_reward_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_celery_url_product_reward_" + newIndex + "_field input").attr('placeholder', 'Celery URL product (Reward) #' + newIndex);


        //reward percent
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_percent_" + oldIndex + "_field").attr('class', 'form-field motivation_reward_percent_' + newIndex + '_field');
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_percent_" + newIndex + "_field label").attr('for', 'motivation_reward_percent_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_percent_" + newIndex + "_field input").attr('name', 'motivation_reward_percent_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_percent_" + newIndex + "_field input").attr('id', 'motivation_reward_percent_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_percent_" + newIndex + "_field input").attr('placeholder', 'Reward Percent #' + newIndex);

        //reward amount
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_amount_" + oldIndex + "_field").attr('class', 'form-field motivation_reward_amount_' + newIndex + '_field');
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_amount_" + newIndex + "_field label").attr('for', 'motivation_reward_amount_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_amount_" + newIndex + "_field input").attr('name', 'motivation_reward_amount_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_amount_" + newIndex + "_field input").attr('id', 'motivation_reward_amount_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_amount_" + newIndex + "_field input").attr('placeholder', 'Reward Amount #' + newIndex);

        //reward backers
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_backers_" + oldIndex + "_field").attr('class', 'form-field motivation_reward_backers_' + newIndex + '_field');
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_backers_" + newIndex + "_field label").attr('for', 'motivation_reward_backers_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_backers_" + newIndex + "_field input").attr('name', 'motivation_reward_backers_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_backers_" + newIndex + "_field input").attr('id', 'motivation_reward_backers_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_backers_" + newIndex + "_field input").attr('placeholder', 'Reward Backers #' + newIndex);

        //reward pledges
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_pledges_" + oldIndex + "_field").attr('class', 'form-field motivation_reward_pledges_' + newIndex + '_field');
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_pledges_" + newIndex + "_field label").attr('for', 'motivation_reward_pledges_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_pledges_" + newIndex + "_field input").attr('name', 'motivation_reward_pledges_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_pledges_" + newIndex + "_field input").attr('id', 'motivation_reward_pledges_' + newIndex);
        $("#motivation_reward_settings .motivation_reward_group_" + newIndex + " p.motivation_reward_pledges_" + newIndex + "_field input").attr('placeholder', 'Reward Pledges #' + newIndex);


    }

    function AddNewRewardToMotivaton(index) {
        $(".motivation_reward_group_empty").clone().appendTo("#motivation_options #motivation_reward_settings");
        changeAttrMotivanionReward('empty', index);
        $(".motivation_reward_group_" + index).attr('style', '');
    }

    function actionsEditOnChangeRewardAmountOne(index) {
        //Add Reward index to button "Remove"
        $(".removeCampaignRewards:eq(" + index + ")").attr('motivation_reward_index', index);
        //Add Reward index to button input Pledge Amount
        $("#wpneo_rewards_pladge_amount\\[\\]:eq(" + index + ")").attr('motivation_reward_index', index);
        //Add action on change Amount in Reward tab
        $("#wpneo_rewards_pladge_amount\\[\\]:eq(" + index + ")").on('input', function (event) {
            //Edit Motivation Reward Amount synchronous with Reward
            $("#motivation_reward_amount_" + index).val($(this).val());
        });

        $('input[id^="motivation_celery_url_product_reward_"]').on('input', function () {
            var curId = $(this).attr('id');
            var curRewardIndex = curId.substr(-(curId.length - ("motivation_celery_url_product_reward_").length));
            document.getElementById('label_motivation_celery_url_product_reward_' + curRewardIndex).innerHTML = $(this).val();
            //alert('label_motivation_celery_url_product_reward_' + curRewardIndex);
        });
    }

    function actionsEditOnChangeRewardAmountAll() {
        var motivation_rewards_counter = $('#wpneo_rewards_pladge_amount\\[\\]').length;
        var motivation_reward_index = 1;
        while (motivation_reward_index <= motivation_rewards_counter - 1) {
            actionsEditOnChangeRewardAmountOne(motivation_reward_index);
            motivation_reward_index++;
        }
    }

    //Cancel all events on wpneo_rewards_pladge_amount[] in reward tab
    function offRewardAmountEvents() {
        var motivation_rewards_counter = $('#wpneo_rewards_pladge_amount\\[\\]').length;
        var motivation_reward_index = 1;
        while (motivation_reward_index <= motivation_rewards_counter - 1) {
            $("#wpneo_rewards_pladge_amount\\[\\]:eq(" + motivation_reward_index + ")").off('input');
            motivation_reward_index++;
        }
        $('input[id^="motivation_celery_url_product_reward_"]').off('input');
    }

    function deductMotivationValue(index) {
        var pledged = parseFloat($("#motivation_pledged").val());
        var backers = parseFloat($("#motivation_backers").val());
        deletedPledges = parseFloat($("#motivation_reward_pledges_" + index).val());
        deletedBackers = parseFloat($("#motivation_reward_backers_" + index).val())
        $("#motivation_pledged").val(pledged - deletedPledges);
        $("#motivation_backers").val(backers - deletedBackers);
        //Calculate new percent
        newPercent = parseFloat($("#motivation_pledged").val()) > parseFloat($("#motivation_funding_goal").val()) ? 100 : round((parseFloat($("#motivation_pledged").val()) * 100) / parseFloat($("#motivation_funding_goal").val()), 2);
        //Change Percent progress bar
        document.getElementById('motivation_pledged_percent_span').innerHTML = newPercent + '% Complete';
        document.getElementById('motivation_pledged_percent').setAttribute('aria-valuenow', newPercent);
        document.getElementById('motivation_pledged_percent').style.width = newPercent + '%';
    }

    //Edit Reward synchronous with Motivation
    actionsEditOnChangeRewardAmountAll();

    //Add Reward
    $("#addreward").click(function () {
        //Add action when add new reward
        var motivation_new_reward_index = $('#wpneo_rewards_pladge_amount\\[\\]').length - 1;
        AddNewRewardToMotivaton(motivation_new_reward_index);
        actionsEditOnChangeRewardAmountOne(motivation_new_reward_index);
        SaveRewardsNumber(motivation_new_reward_index);

    });

    //Remove Reward
    $('body').on('click', '.removeCampaignRewards', function (e) {
        var deletedRewardIndex = $(this).attr('motivation_reward_index');
        alert("Removing!!! Reward #" + deletedRewardIndex);
        //Decount Total reward and pledges
        deductMotivationValue(deletedRewardIndex);
        //Delete motivation reward block
        $(".motivation_reward_group_" + deletedRewardIndex).html("");
        $(".motivation_reward_group_" + deletedRewardIndex).remove();
        //Re index inputs and buttons in Reward tab
        offRewardAmountEvents();
        actionsEditOnChangeRewardAmountAll();
        var newRewardsNumber = $('#wpneo_rewards_pladge_amount\\[\\]').length - 1;
        //Re index inputs in Motivation tab
        var ii = 1;
        while (ii <= newRewardsNumber) {
            currentMotivationIndex = $(".motivation_reward_header:eq(" + ii + ")").attr('motivation_reward_index');
            changeAttrMotivanionReward(currentMotivationIndex, ii);
            ii++;
        }
        SaveRewardsNumber(newRewardsNumber);
    });
});