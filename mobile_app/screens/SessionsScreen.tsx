import * as React from 'react';
import { useNavigation } from '@react-navigation/native';
import { StackHeaderLeftButtonProps } from '@react-navigation/stack';

import { Text, View } from '../components/Themed';
import MenuIcon from '../components/MenuIcon';
import { useEffect } from 'react';
import Stars from 'react-native-stars';
import Icon from 'react-native-vector-icons/MaterialCommunityIcons';
import { SafeAreaView, FlatList, StyleSheet, StatusBar, Button } from 'react-native';


const sessionExamples = [
  {
    id: 1,
    name: "Surfing waves in the Mediterranée",
    comment: "Cool spot, lots of waves, not too crowded.",
    avisSession: 4.0,
    dateDebut: new Date('2018-09-22T15:00:00'),
    dateFin: new Date('2018-09-22T16:00:00'),
    frequentation: "calm",
    longitude: 25.54,
    latitude: 15.12
  },
  {
    id: 2,
    name: "Surfing waves in Mer du Nord",
    comment: "It's freezing here man!",
    avisSession: 3.0,
    dateDebut: new Date('2018-10-22T15:00:00'),
    dateFin: new Date('2018-10-22T16:00:00'),
    frequentation: "normal",
    longitude: 25.54,
    latitude: 15.12
  },
]

const styles = StyleSheet.create({
  container: {
    flex: 1,
    marginTop: StatusBar.currentHeight || 0,
  },
  item: {
    backgroundColor: '#bfcfff',
    fontColor: 'white',
    padding: 20,
    borderRadius: 5,
    marginVertical: 8,
    marginHorizontal: 16,
  },
  title: {
    fontSize: 18,
  },
  contentText: {
    fontSize: 12
  },
  fixToText: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    padding: 5,
    fontColor: 'white',
    backgroundColor: '#bfcfff'
  },
  rating: {
    backgroundColor: '#bfcfff',
    fontColor: 'white',
    alignItems: 'center'
  }
});

export default function SessionsScreen() {
  const navigation = useNavigation();

  const renderItem = ({ item }) => (
    <View style={styles.item}>
      <View style={styles.fixToText}> 
        <Button
          onPress={() =>{}}
          title="Edit"
          color="#0000ff"
          accessibilityLabel="Edit the session"
        />
        <Button
          onPress={() =>{}}
          title="Report"
          color="#0000ff"
          accessibilityLabel="Report an event"
        />
      </View>
      <Text style={styles.contentText}><i>From {item.dateDebut.toLocaleString()}</i></Text>
      <Text style={styles.contentText}><i>to {item.dateFin.toLocaleString()}</i></Text>
      <Text style={styles.title}>{item.name}</Text>
      <Text style={styles.contentText}>{item.comment}</Text>
      <br/>
      <View style={styles.rating}>
        <Stars 
          display={item.avisSession}
          spacing={8}
          count={5}
          starSize={40}
          fullStar= {require('../assets/images/starFilled.png')}
          halfStar= {require('../assets/images/starHalf.png')}
          emptyStar= {require('../assets/images/starEmpty.png')}/>
      </View>
    </View>
  );
  useEffect(() => {
    navigation.setOptions({
      headerLeft: (props: StackHeaderLeftButtonProps) => (<MenuIcon/>)
    });
  });

  return (
    <SafeAreaView style={styles.container}>
      <FlatList
        data={sessionExamples}
        renderItem={renderItem}
        keyExtractor={item => item.id}
      />
    </SafeAreaView>
  )
};