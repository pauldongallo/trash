function rassignAgentAfterDelete(){
	var agentIDs=[];
	var agentIDsSet=[];
	var current_link = this.value;
	var citrus_result = "";
	var arraySet = "";

	$(".deleteUser").each(function(index, value){
		if(current_link != this.value){
			agentIDs.push(this.value);
		}
	});
	for(i=0; i < agentIDs.length; i++){
		if(agentIDs[i]<current_link){
			agentIDsSet.push(agentIDs[i]);
		}
	}
	var getDecreaseOne = get_count(agentIDsSet) - 1;
	if(getDecreaseOne == -1){
		for(i=0; i < agentIDs.length; i++){
			if(agentIDs[i]>current_link){
				var agentIDsSet = agentIDs[0];
				// agentIDsSet.push(agentIDs[i]);
			}
		}
		arraySet = agentIDsSet;
	} else {
		arraySet = agentIDsSet[getDecreaseOne];
	}

	return arraySet;
}

function get_count(parameter){
	return parameter.length;
}