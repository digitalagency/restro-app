

import React, { Component } from 'react';
import {
  Platform,
  StyleSheet,
  Text,
  View,
  AppRegistry,
  TextInput
} from 'react-native';


export default class SearchBar extends Component<Props> {
  render() {
    return (
      <View style = {styles.container}>
        <Text>Wine & Dine</Text>
      
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container:{
    backgroundColor: 'grey',
  },
  iconBar:{
    flex: 1,

  }
});

AppRegistry.registerComponent('SearchBar', () => SearchBar);
