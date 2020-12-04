import * as React from 'react';
import { StyleSheet, FlatList, Button } from 'react-native';
import { useNavigation } from '@react-navigation/native';
import { StackHeaderLeftButtonProps } from '@react-navigation/stack';

import { Text, View } from '../components/Themed';
import MenuIcon from '../components/MenuIcon';
import { useEffect } from 'react';
import main from '../styles/main';

export default function HomeScreen() {
  const navigation = useNavigation();

  const styles = StyleSheet.create({
    item: {
      backgroundColor: '#bfcfff',
      padding: 20,
      marginVertical: 8,
      marginHorizontal: 16,
    },
    title: {
      fontSize: 18,
    },
    contentText: {
      fontSize: 12
    },
  });

  useEffect(() => {
    navigation.setOptions({
      showHeader: true,
      headerLeft: (props: StackHeaderLeftButtonProps) => (<MenuIcon/>)
    });
  });

  return (
    <View style={main.centered}>
      <View style={styles.item}>
        <Text style={styles.title}>Welcome in Moana!</Text>
        <Text style={styles.contentText}>Through Moana, you can start your surfing session and record time and metrics from it. Start by launching your session!</Text>
        <br/>
        <Button
          onPress={() =>{navigation.navigate("Start a session");}}
          title="Start a session"
          color="#0000ff"
          accessibilityLabel="Start a session"
        />
      </View>
    </View>
  )
};