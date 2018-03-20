import React from 'react';
import { View, Text, Button, StyleSheet, Animated } from 'react-native';

export default class OfferScreen extends React.Component {
	static navigationOptions = {
	  header : null
	}

	render(){
		return(
			<View>
				<Text style = {{fontSize: 25}}>Offers</Text>
			</View>

		)
	}
}