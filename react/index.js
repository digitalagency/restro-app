import React, { Component } from 'react';
import { AppRegistry, View, Text, ScrollView } from 'react-native';

import App from './App';
{/*
export default class apple extends Component<Props> {
  render() {
    return (
      <View>
      	<Text>APP</Text>
      	<App />
       	
      </View>
    );
  }
}
*/}


AppRegistry.registerComponent('wine', () => App);
