$(function(){$("input,textarea").jqBootstrapValidation({preventSubmit:!0,submitError:function(a,e,t){},submitSuccess:function(a,e){e.preventDefault();var t=$("input#name").val(),i=$("input#email").val(),n=$("input#phone").val(),o=$("textarea#message").val(),r=t;r.indexOf(" ")>=0&&(r=t.split(" ").slice(0,-1).join(" ")),$.ajax({url:"././mail/contact_me.php",type:"POST",data:{name:t,phone:n,email:i,message:o},cache:!1,success:function(){$("#success").html("<div class='alert alert-success'>"),$("#success > .alert-success").html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>"),$("#success > .alert-success").append("<strong>Your message has been sent. </strong>"),$("#success > .alert-success").append("</div>"),$("#contactForm").trigger("reset")},error:function(){$("#success").html("<div class='alert alert-danger'>"),$("#success > .alert-danger").html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>"),$("#success > .alert-danger").append("<strong>Sorry "+r+", it seems that my mail server is not responding. Please try again later!"),$("#success > .alert-danger").append("</div>"),$("#contactForm").trigger("reset")}})},filter:function(){return $(this).is(":visible")}}),$('a[data-toggle="tab"]').click(function(a){a.preventDefault(),$(this).tab("show")})}),$("#name").focus(function(){$("#success").html("")}),function($){function a(a){return new RegExp("^"+a+"$")}function e(a,e){for(var t=Array.prototype.slice.call(arguments).splice(2),i=a.split("."),n=i.pop(),o=0;o<i.length;o++)e=e[i[o]];return e[n].apply(this,t)}var t=[],i={options:{prependExistingHelpBlock:!1,sniffHtml:!0,preventSubmit:!0,submitError:!1,submitSuccess:!1,semanticallyStrict:!1,autoAdd:{helpBlocks:!0},filter:function(){return!0}},methods:{init:function(a){var e=$.extend(!0,{},i);e.options=$.extend(!0,e.options,a);var r=this,s=$.unique(r.map(function(){return $(this).parents("form")[0]}).toArray());return $(s).bind("submit",function(a){var t=$(this),i=0,n=t.find("input,textarea,select").not("[type=submit],[type=image]").filter(e.options.filter);n.trigger("submit.validation").trigger("validationLostFocus.validation"),n.each(function(a,e){var t=$(e),n=t.parents(".form-group").first();n.hasClass("warning")&&(n.removeClass("warning").addClass("error"),i++)}),n.trigger("validationLostFocus.validation"),i?(e.options.preventSubmit&&a.preventDefault(),t.addClass("error"),$.isFunction(e.options.submitError)&&e.options.submitError(t,a,n.jqBootstrapValidation("collectErrors",!0))):(t.removeClass("error"),$.isFunction(e.options.submitSuccess)&&e.options.submitSuccess(t,a))}),this.each(function(){var a=$(this),i=a.parents(".form-group").first(),r=i.find(".help-block").first(),s=a.parents("form").first(),l=[];if(!r.length&&e.options.autoAdd&&e.options.autoAdd.helpBlocks&&(r=$('<div class="help-block" />'),i.find(".controls").append(r),t.push(r[0])),e.options.sniffHtml){var d="";if(void 0!==a.attr("pattern")&&(d="Not in the expected format<!-- data-validation-pattern-message to override -->",a.data("validationPatternMessage")&&(d=a.data("validationPatternMessage")),a.data("validationPatternMessage",d),a.data("validationPatternRegex",a.attr("pattern"))),void 0!==a.attr("max")||void 0!==a.attr("aria-valuemax")){var c=a.attr(void 0!==a.attr("max")?"max":"aria-valuemax");d="Too high: Maximum of '"+c+"'<!-- data-validation-max-message to override -->",a.data("validationMaxMessage")&&(d=a.data("validationMaxMessage")),a.data("validationMaxMessage",d),a.data("validationMaxMax",c)}if(void 0!==a.attr("min")||void 0!==a.attr("aria-valuemin")){var u=a.attr(void 0!==a.attr("min")?"min":"aria-valuemin");d="Too low: Minimum of '"+u+"'<!-- data-validation-min-message to override -->",a.data("validationMinMessage")&&(d=a.data("validationMinMessage")),a.data("validationMinMessage",d),a.data("validationMinMin",u)}void 0!==a.attr("maxlength")&&(d="Too long: Maximum of '"+a.attr("maxlength")+"' characters<!-- data-validation-maxlength-message to override -->",a.data("validationMaxlengthMessage")&&(d=a.data("validationMaxlengthMessage")),a.data("validationMaxlengthMessage",d),a.data("validationMaxlengthMaxlength",a.attr("maxlength"))),void 0!==a.attr("minlength")&&(d="Too short: Minimum of '"+a.attr("minlength")+"' characters<!-- data-validation-minlength-message to override -->",a.data("validationMinlengthMessage")&&(d=a.data("validationMinlengthMessage")),a.data("validationMinlengthMessage",d),a.data("validationMinlengthMinlength",a.attr("minlength"))),(void 0!==a.attr("required")||void 0!==a.attr("aria-required"))&&(d=e.builtInValidators.required.message,a.data("validationRequiredMessage")&&(d=a.data("validationRequiredMessage")),a.data("validationRequiredMessage",d)),void 0!==a.attr("type")&&"number"===a.attr("type").toLowerCase()&&(d=e.builtInValidators.number.message,a.data("validationNumberMessage")&&(d=a.data("validationNumberMessage")),a.data("validationNumberMessage",d)),void 0!==a.attr("type")&&"email"===a.attr("type").toLowerCase()&&(d="Not a valid email address<!-- data-validator-validemail-message to override -->",a.data("validationValidemailMessage")?d=a.data("validationValidemailMessage"):a.data("validationEmailMessage")&&(d=a.data("validationEmailMessage")),a.data("validationValidemailMessage",d)),void 0!==a.attr("minchecked")&&(d="Not enough options checked; Minimum of '"+a.attr("minchecked")+"' required<!-- data-validation-minchecked-message to override -->",a.data("validationMincheckedMessage")&&(d=a.data("validationMincheckedMessage")),a.data("validationMincheckedMessage",d),a.data("validationMincheckedMinchecked",a.attr("minchecked"))),void 0!==a.attr("maxchecked")&&(d="Too many options checked; Maximum of '"+a.attr("maxchecked")+"' required<!-- data-validation-maxchecked-message to override -->",a.data("validationMaxcheckedMessage")&&(d=a.data("validationMaxcheckedMessage")),a.data("validationMaxcheckedMessage",d),a.data("validationMaxcheckedMaxchecked",a.attr("maxchecked")))}void 0!==a.data("validation")&&(l=a.data("validation").split(",")),$.each(a.data(),function(a,e){var t=a.replace(/([A-Z])/g,",$1").split(",");"validation"===t[0]&&t[1]&&l.push(t[1])});var m=l,v=[];do $.each(l,function(a,e){l[a]=n(e)}),l=$.unique(l),v=[],$.each(m,function(t,i){if(void 0!==a.data("validation"+i+"Shortcut"))$.each(a.data("validation"+i+"Shortcut").split(","),function(a,e){v.push(e)});else if(e.builtInValidators[i.toLowerCase()]){var o=e.builtInValidators[i.toLowerCase()];"shortcut"===o.type.toLowerCase()&&$.each(o.shortcut.split(","),function(a,e){e=n(e),v.push(e),l.push(e)})}}),m=v;while(m.length>0);var g={};$.each(l,function(t,i){var o=a.data("validation"+i+"Message"),r=void 0!==o,s=!1;if(o=o?o:"'"+i+"' validation failed <!-- Add attribute 'data-validation-"+i.toLowerCase()+"-message' to input to change this message -->",$.each(e.validatorTypes,function(e,t){void 0===g[e]&&(g[e]=[]),s||void 0===a.data("validation"+i+n(t.name))||(g[e].push($.extend(!0,{name:n(t.name),message:o},t.init(a,i))),s=!0)}),!s&&e.builtInValidators[i.toLowerCase()]){var l=$.extend(!0,{},e.builtInValidators[i.toLowerCase()]);r&&(l.message=o);var d=l.type.toLowerCase();"shortcut"===d?s=!0:$.each(e.validatorTypes,function(e,t){void 0===g[e]&&(g[e]=[]),s||d!==e.toLowerCase()||(a.data("validation"+i+n(t.name),l[t.name.toLowerCase()]),g[d].push($.extend(l,t.init(a,i))),s=!0)})}s||$.error("Cannot find validation info for '"+i+"'")}),r.data("original-contents",r.data("original-contents")?r.data("original-contents"):r.html()),r.data("original-role",r.data("original-role")?r.data("original-role"):r.attr("role")),i.data("original-classes",i.data("original-clases")?i.data("original-classes"):i.attr("class")),a.data("original-aria-invalid",a.data("original-aria-invalid")?a.data("original-aria-invalid"):a.attr("aria-invalid")),a.bind("validation.validation",function(t,i){var n=o(a),r=[];return $.each(g,function(t,o){(n||n.length||i&&i.includeEmpty||e.validatorTypes[t].blockSubmit&&i&&i.submitting)&&$.each(o,function(i,o){e.validatorTypes[t].validate(a,n,o)&&r.push(o.message)})}),r}),a.bind("getValidators.validation",function(){return g}),a.bind("submit.validation",function(){return a.triggerHandler("change.validation",{submitting:!0})}),a.bind(["keyup","focus","blur","click","keydown","keypress","change"].join(".validation ")+".validation",function(t,n){var l=o(a),d=[];i.find("input,textarea,select").each(function(e,t){var i=d.length;if($.each($(t).triggerHandler("validation.validation",n),function(a,e){d.push(e)}),d.length>i)$(t).attr("aria-invalid","true");else{var o=a.data("original-aria-invalid");$(t).attr("aria-invalid",void 0!==o?o:!1)}}),s.find("input,select,textarea").not(a).not('[name="'+a.attr("name")+'"]').trigger("validationLostFocus.validation"),d=$.unique(d.sort()),d.length?(i.removeClass("success error").addClass("warning"),r.html(e.options.semanticallyStrict&&1===d.length?d[0]+(e.options.prependExistingHelpBlock?r.data("original-contents"):""):'<ul role="alert"><li>'+d.join("</li><li>")+"</li></ul>"+(e.options.prependExistingHelpBlock?r.data("original-contents"):""))):(i.removeClass("warning error success"),l.length>0&&i.addClass("success"),r.html(r.data("original-contents"))),"blur"===t.type&&i.removeClass("success")}),a.bind("validationLostFocus.validation",function(){i.removeClass("success")})})},destroy:function(){return this.each(function(){var a=$(this),e=a.parents(".form-group").first(),i=e.find(".help-block").first();a.unbind(".validation"),i.html(i.data("original-contents")),e.attr("class",e.data("original-classes")),a.attr("aria-invalid",a.data("original-aria-invalid")),i.attr("role",a.data("original-role")),t.indexOf(i[0])>-1&&i.remove()})},collectErrors:function(a){var e={};return this.each(function(a,t){var i=$(t),n=i.attr("name"),o=i.triggerHandler("validation.validation",{includeEmpty:!0});e[n]=$.extend(!0,o,e[n])}),$.each(e,function(a,t){0===t.length&&delete e[a]}),e},hasErrors:function(){var a=[];return this.each(function(e,t){a=a.concat($(t).triggerHandler("getValidators.validation")?$(t).triggerHandler("validation.validation",{submitting:!0}):[])}),a.length>0},override:function(a){i=$.extend(!0,i,a)}},validatorTypes:{callback:{name:"callback",init:function(a,e){return{validatorName:e,callback:a.data("validation"+e+"Callback"),lastValue:a.val(),lastValid:!0,lastFinished:!0}},validate:function(a,t,i){if(i.lastValue===t&&i.lastFinished)return!i.lastValid;if(i.lastFinished===!0){i.lastValue=t,i.lastValid=!0,i.lastFinished=!1;var n=i,o=a;e(i.callback,window,a,t,function(a){n.lastValue===a.value&&(n.lastValid=a.valid,a.message&&(n.message=a.message),n.lastFinished=!0,o.data("validation"+n.validatorName+"Message",n.message),setTimeout(function(){o.trigger("change.validation")},1))})}return!1}},ajax:{name:"ajax",init:function(a,e){return{validatorName:e,url:a.data("validation"+e+"Ajax"),lastValue:a.val(),lastValid:!0,lastFinished:!0}},validate:function(a,e,t){return""+t.lastValue==""+e&&t.lastFinished===!0?t.lastValid===!1:(t.lastFinished===!0&&(t.lastValue=e,t.lastValid=!0,t.lastFinished=!1,$.ajax({url:t.url,data:"value="+e+"&field="+a.attr("name"),dataType:"json",success:function(e){""+t.lastValue==""+e.value&&(t.lastValid=!!e.valid,e.message&&(t.message=e.message),t.lastFinished=!0,a.data("validation"+t.validatorName+"Message",t.message),setTimeout(function(){a.trigger("change.validation")},1))},failure:function(){t.lastValid=!0,t.message="ajax call failed",t.lastFinished=!0,a.data("validation"+t.validatorName+"Message",t.message),setTimeout(function(){a.trigger("change.validation")},1)}})),!1)}},regex:{name:"regex",init:function(e,t){return{regex:a(e.data("validation"+t+"Regex"))}},validate:function(a,e,t){return!t.regex.test(e)&&!t.negative||t.regex.test(e)&&t.negative}},required:{name:"required",init:function(a,e){return{}},validate:function(a,e,t){return!(0!==e.length||t.negative)||!!(e.length>0&&t.negative)},blockSubmit:!0},match:{name:"match",init:function(a,e){var t=a.parents("form").first().find('[name="'+a.data("validation"+e+"Match")+'"]').first();return t.bind("validation.validation",function(){a.trigger("change.validation",{submitting:!0})}),{element:t}},validate:function(a,e,t){return e!==t.element.val()&&!t.negative||e===t.element.val()&&t.negative},blockSubmit:!0},max:{name:"max",init:function(a,e){return{max:a.data("validation"+e+"Max")}},validate:function(a,e,t){return parseFloat(e,10)>parseFloat(t.max,10)&&!t.negative||parseFloat(e,10)<=parseFloat(t.max,10)&&t.negative}},min:{name:"min",init:function(a,e){return{min:a.data("validation"+e+"Min")}},validate:function(a,e,t){return parseFloat(e)<parseFloat(t.min)&&!t.negative||parseFloat(e)>=parseFloat(t.min)&&t.negative}},maxlength:{name:"maxlength",init:function(a,e){return{maxlength:a.data("validation"+e+"Maxlength")}},validate:function(a,e,t){return e.length>t.maxlength&&!t.negative||e.length<=t.maxlength&&t.negative}},minlength:{name:"minlength",init:function(a,e){return{minlength:a.data("validation"+e+"Minlength")}},validate:function(a,e,t){return e.length<t.minlength&&!t.negative||e.length>=t.minlength&&t.negative}},maxchecked:{name:"maxchecked",init:function(a,e){var t=a.parents("form").first().find('[name="'+a.attr("name")+'"]');return t.bind("click.validation",function(){a.trigger("change.validation",{includeEmpty:!0})}),{maxchecked:a.data("validation"+e+"Maxchecked"),elements:t}},validate:function(a,e,t){return t.elements.filter(":checked").length>t.maxchecked&&!t.negative||t.elements.filter(":checked").length<=t.maxchecked&&t.negative},blockSubmit:!0},minchecked:{name:"minchecked",init:function(a,e){var t=a.parents("form").first().find('[name="'+a.attr("name")+'"]');return t.bind("click.validation",function(){a.trigger("change.validation",{includeEmpty:!0})}),{minchecked:a.data("validation"+e+"Minchecked"),elements:t}},validate:function(a,e,t){return t.elements.filter(":checked").length<t.minchecked&&!t.negative||t.elements.filter(":checked").length>=t.minchecked&&t.negative},blockSubmit:!0}},builtInValidators:{email:{name:"Email",type:"shortcut",shortcut:"validemail"},validemail:{name:"Validemail",type:"regex",regex:"[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,4}",message:"Not a valid email address<!-- data-validator-validemail-message to override -->"},passwordagain:{name:"Passwordagain",type:"match",match:"password",message:"Does not match the given password<!-- data-validator-paswordagain-message to override -->"},positive:{name:"Positive",type:"shortcut",shortcut:"number,positivenumber"},negative:{name:"Negative",type:"shortcut",shortcut:"number,negativenumber"},number:{name:"Number",type:"regex",regex:"([+-]?\\d+(\\.\\d*)?([eE][+-]?[0-9]+)?)?",message:"Must be a number<!-- data-validator-number-message to override -->"},integer:{name:"Integer",type:"regex",regex:"[+-]?\\d+",message:"No decimal places allowed<!-- data-validator-integer-message to override -->"},positivenumber:{name:"Positivenumber",type:"min",min:0,message:"Must be a positive number<!-- data-validator-positivenumber-message to override -->"},negativenumber:{name:"Negativenumber",type:"max",max:0,message:"Must be a negative number<!-- data-validator-negativenumber-message to override -->"},required:{name:"Required",type:"required",message:"This is required<!-- data-validator-required-message to override -->"},checkone:{name:"Checkone",type:"minchecked",minchecked:1,message:"Check at least one option<!-- data-validation-checkone-message to override -->"}}},n=function(a){return a.toLowerCase().replace(/(^|\s)([a-z])/g,function(a,e,t){return e+t.toUpperCase()})},o=function(a){var e=a.val(),t=a.attr("type");return"checkbox"===t&&(e=a.is(":checked")?e:""),"radio"===t&&(e=$('input[name="'+a.attr("name")+'"]:checked').length>0?e:""),e};$.fn.jqBootstrapValidation=function(a){return i.methods[a]?i.methods[a].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof a&&a?($.error("Method "+a+" does not exist on jQuery.jqBootstrapValidation"),null):i.methods.init.apply(this,arguments)},$.jqBootstrapValidation=function(a){$(":input").not("[type=image],[type=submit]").jqBootstrapValidation.apply(this,arguments)}}(jQuery),$(function(){$("body").on("input propertychange",".floating-label-form-group",function(a){$(this).toggleClass("floating-label-form-group-with-value",!!$(a.target).val())}).on("focus",".floating-label-form-group",function(){$(this).addClass("floating-label-form-group-with-focus")}).on("blur",".floating-label-form-group",function(){$(this).removeClass("floating-label-form-group-with-focus")})}),jQuery(document).ready(function($){var a=1170;if($(window).width()>a){var e=$(".navbar-custom").height();$(window).on("scroll",{previousTop:0},function(){var a=$(window).scrollTop();a<this.previousTop?a>0&&$(".navbar-custom").hasClass("is-fixed")?$(".navbar-custom").addClass("is-visible"):$(".navbar-custom").removeClass("is-visible is-fixed"):($(".navbar-custom").removeClass("is-visible"),a>e&&!$(".navbar-custom").hasClass("is-fixed")&&$(".navbar-custom").addClass("is-fixed")),this.previousTop=a})}});