RightNow.namespace('Custom.Widgets.mukul.incident_create');
Custom.Widgets.mukul.incident_create = RightNow.Widgets.extend({ 
    /**
     * Widget constructor.
     */
    constructor: function() {
        var Event = this.Y.Event;
        var btn = this.Y.one(this.baseSelector + "_submitButton");
        Event.attach("click", this._formData, btn, this);
        this.data = {subject : null, email : null};
    },

    /**
     * Sample widget method.
     */
    methodName: function() {

    },

    _formData : function(){
        console.log("inside _formData");
        var subject = this.Y.one(this.baseSelector + "_subject").get('value');
        var email = this.Y.one(this.baseSelector + "_email").get('value');
        this.data.subject = subject;
        this.data.email = email;
        // console.log(this.data);
        this.getDefault_ajax_endpoint();
    },

    /**
     * Makes an AJAX request for `default_ajax_endpoint`.
     */
    getDefault_ajax_endpoint: function() {
        // Make AJAX request:
        var eventObj = new RightNow.Event.EventObject(this, {data:{
            // w_id: this.data.info.w_id,
            subject : this.data.subject,
            email : this.data.email
            // Parameters to send
        }});
        // RightNow.Ajax.makeRequest(this.data.attrs.default_ajax_endpoint, eventObj.data, {
        RightNow.Ajax.makeRequest("/cc/customajaxmb/incident_create", eventObj.data, {
            successHandler: this.default_ajax_endpointCallback,
            failureHandler: function(data){
                console.log(data);
            },
            scope:          this,
            data:           eventObj,
            json:           true
        });
    },

    /**
     * Handles the AJAX response for `default_ajax_endpoint`.
     * @param {object} response JSON-parsed response from the server
     * @param {object} originalEventObj `eventObj` from #getDefault_ajax_endpoint
     */
    default_ajax_endpointCallback: function(response, originalEventObj) {
        // Handle response
        // alert("Hello");
    }
});